<?php

namespace App\Http\Controllers;

use Curl;
// use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\AddtoCart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request){
        // Validate the form data
        $request->validate([
            'paymentMethod' => 'required|in:CoD,Gcash',
            // Add additional validation rules if needed
        ]);

        $successUrl = 'http://127.0.0.1:8000/checkout/success';

        foreach($request->product as $index => $product){
            $successUrl .= ($index == 0 ? '?' : '&') . "product[$index]=" . urlencode($product);
        }

        foreach($request->stock as $index => $stock){
            $successUrl .= "&stock[$index]=" . urlencode($stock);
        }

        foreach($request->id as $index => $id){
            $successUrl .= "&id[$index]=" . urlencode($id);
        }
        $product = $request->product;
        $stock = $request->stock;
        $id = $request->id;


        $totalAmount = $request->totalPrice*100;
        $totalPrice = $request->totalPrice;


        // dump($successUrl);
        // dump($totalPrice);
        // dump($totalAmount);

        // Process the order based on the selected payment method
        $paymentMethod = $request->paymentMethod;
        $successUrl .= "&paymentMethod=".urlencode($paymentMethod);

        $shippingAddress = "$request->shippingAddress";
        $successUrl .= "&shippingAddress=" . urlencode($shippingAddress);

        $successUrl .= "&totalPrice=".urlencode($totalPrice);
        

        dump($successUrl);
        // dump("this is " . urlencode($shippingAddress));

        $itemName = "";
        $productName = $request->productName;
        foreach($productName as $name){
            $itemName .= $name." || ";
        }

        if ($paymentMethod === 'Gcash') {
            $data = [
                'data' => [
                    'attributes' => [
                        'line_items' => [
                            [
                                'currency' => 'PHP',
                                'amount' => (int)$totalAmount,
                                // 'description' => 'text',
                                'name' => $itemName,
                                'quantity' => 1,
        
                            ]
                        ],
                        'payment_method_types' => [
                            // 'card',
                            'gcash',
                        ],
                        'success_url' => $successUrl,
                        'cancel_url' => 'http://127.0.0.1:8000/checkout',
                        // 'description' => 'text'
                    ],
                ]
            ];
            $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                                ->withHeader('Content-Type: application/json')
                                ->withHeader('accept: application/json')
                                ->withHeader('authorization: Basic c2tfdGVzdF95ZGVVNkxhaFpOcjR6and3OU5QOWlVdzI6')
                                ->withData($data)
                                ->asJson()
                                ->post();
    
            // dump($response);
            \Session::put('session_id', $response->data->id);

            // dump($response);
    
            return redirect()->to($response->data->attributes->checkout_url);
        }
        // dump($id);
        // dump($shippingAddress);
        // dump($request->shippingAddress);

        return redirect()->route('checkout.success', compact('product','stock','id', 'paymentMethod', 'shippingAddress', 'totalPrice'));
    }

    public function checkoutSuccess(Request $request)
    {

        $sessionId = \Session::get('session_id');
        
        
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
                            ->withHeader('accept: application/json')
                            ->withHeader('authorization: Basic c2tfdGVzdF95ZGVVNkxhaFpOcjR6and3OU5QOWlVdzI6')
                            ->asJson()
                            ->get();

        $user = auth()->user();
        $details = "";
        for($i = 0; $i < count($request->product); $i++){
            $product = Product::find($request->product[$i]);
            $product->update([
                'stock' => $product->stock - $request->stock[$i]
            ]);

            $addtoCart = AddtoCart::find($request->id[$i]);
            $addtoCart->delete();
            $details .= $product->productName;
        }


        // $totalPrice = urldecode($request->query('totalPrice'));
        $totalPrice = $request->totalPrice;
        $paymentMethod = $request->paymentMethod;
        $shippingAddress = $request->shippingAddress;

        // dump($totalPrice);
        // dump($request->totalPrice);

        $order = Order::create([
            "user_id" => $user->id,
            "details" => $details,
            "totalPrice" => $totalPrice,
            "paymentMethod" => $paymentMethod,
            "shippingAddress" => $shippingAddress,
        ]);
        
        return view('checkout.success', compact("details", "totalPrice", "paymentMethod", "shippingAddress"));
    }

    public function checkoutFailed()
    {
        // Logic for failed payment
        return view('checkout.failed');
    }
}