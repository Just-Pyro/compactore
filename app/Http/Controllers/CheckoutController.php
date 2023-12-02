<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Curl;

class CheckoutController extends Controller
{
    // public function createSession()
    // {
    //     $apiKey = env('PAYMONGO_API_KEY');

    //     $client = new Client();

    //     $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
    //         'body' => '{"data":{"attributes":{"send_email_receipt":false,"show_description":true,"show_line_items":true}}}',
    //         'headers' => [
    //             'Content-Type' => 'application/json',
    //             'accept' => 'application/json',
    //             'Authorization' => 'Bearer ' . $apiKey,
    //         ],
    //     ]);

    //     // Handle the response as needed, e.g., return it or further processing
    //     return $response->getBody();
    // }

    public function placeOrder(Request $request){
        // Validate the form data
        $request->validate([
            'paymentMethod' => 'required|in:CoD,Gcash',
            // Add additional validation rules if needed
        ]);

        $totalAmount = $request->totalPrice*100;
        // Process the order based on the selected payment method
        $paymentMethod = $request->paymentMethod;

        $productName = $request->productName;
        foreach($productName as $name){
            $itemName = $name." | ";
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
                        'success_url' => 'http:://localhost:8000/checkout/success',
                        'cancel_url' => 'http:://localhost:8000/checkout/success',
                        // 'description' => 'text'
                    ],
                ]
            ];
            $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                                ->withHeader('Content-Type: application/json')
                                ->withHeader('accept: application/json')
                                ->withHeader('Authorization: Basic c2tfdGVzdF95ZGVVNkxhaFpOcjR6and3OU5QOWlVdzI6')
                                ->withData($data)
                                ->asJson()
                                ->post();
    
            // dd($response);
            \Session::put('session_id', $response->data->id);
    
            return redirect()->to($response->data->attributes->checkout_url);
        }

        // For CoD or other payment methods, update the order status directly

        // Save the order to the database
        // ...

        // Return a response
        return response()->json(['message' => 'Order placed successfully']);
    }

    // public function placeOrder(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'paymentMethod' => 'required|in:CoD,Gcash',
    //         'totalPrice' => 'required|numeric',
    //         // Add additional validation rules if needed
    //     ]);

    //     $totalAmount = $request->input('totalPrice');
    //     $paymentMethod = $request->input('paymentMethod');

    //     if ($paymentMethod === 'Gcash') {
    //         // Create a payment session on PayMongo
    //         $paymentSessionId = $this->createPaymentSession($totalAmount);

    //         // Redirect to PayMongo hosted checkout page
    //         return redirect()->away("https://checkout.paymongo.com/{$paymentSessionId}");
    //     }

    //     // For CoD or other payment methods, update the order status directly
    //     // Save the order to the database
    //     // ...

    //     // Return a response
    //     return response()->json(['message' => 'Order placed successfully']);
    // }

    // protected function createPaymentSession($totalAmount)
    // {
    //     // Use Guzzle or any HTTP client to create a payment session on PayMongo
    //     $client = new Client();
    //     $paymongoSecretKey = env('PAYMONGO_SECRET_KEY');

    //     $response = $client->post('https://api.paymongo.com/v2/payment_sessions', [
    //         'headers' => [
    //             'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . $paymongoSecretKey,
    //         ],
    //         'json' => [
    //             'data' => [
    //                 'attributes' => [
    //                     'amount' => $totalAmount,
    //                     'payment_method_allowed' => ['Gcash'], // Update with the allowed payment methods
    //                     'redirect' => [
    //                         'success' => route('checkout.success'),
    //                         'failed' => route('checkout.failed'),
    //                     ],
    //                 ],
    //             ],
    //         ],
    //     ]);

    //     $responseData = json_decode($response->getBody(), true);

    //     // Check if the response contains the session ID
    //     if (isset($responseData['data']['id'])) {
    //         return $responseData['data']['id'];
    //     }

    //     // Handle the case where the session ID is not available
    //     // You might want to log an error or throw an exception
    //     // ...

    //     return null;
    // }

    public function checkoutSuccess()
    {

        $sessionId = \Session::get('session_id');
        
        
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
                            ->withHeader('accept: application/json')
                            ->withHeader('Authorization: Basic c2tfdGVzdF95ZGVVNkxhaFpOcjR6and3OU5QOWlVdzI6')
                            ->asJson()
                            ->get();
        dd($response);
        // return view('checkout.success');
    }

    public function checkoutFailed()
    {
        // Logic for failed payment
        return view('checkout.failed');
    }
}
