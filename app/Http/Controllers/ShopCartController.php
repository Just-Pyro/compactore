<?php

namespace App\Http\Controllers;

use App\Models\AddtoCart;
use App\Models\Product;
use App\Models\ShopCart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function add(Request $request){
        $user = auth()->user();
        $userCart = $user->cart;

        $product = Product::find($request->product_id);

        //check if user's cart is empty
        if($userCart != null){
            $carts = AddtoCart::where('product_id', $request->product_id)->where('shopCart_id', $userCart->id)->get();
            if ($carts->isNotEmpty()) {
                // Update existing cart entry
                $cart = $carts->first(); // Assuming you want to update the first matching cart
                $cart->quantity += $request->qty;
                $cart->totalPrice += $product->price * $request->qty;
                $cart->save();
            } else {
                // Create a new cart entry
                $shopCart = new AddtoCart();
                $shopCart->shopCart_id = $userCart->id;
                $shopCart->product_id = $request->product_id;
                $shopCart->productName = $product->productName;
                $shopCart->quantity = $request->qty;
                $shopCart->price = $product->price;
                $shopCart->totalPrice = $product->price * $request->qty;
                $shopCart->save();
            }
        }else{
            $userCart = ShopCart::create([
                "user_id" => $user->id
            ]);
            $carts = AddtoCart::where('product_id', $request->product_id)->where('shopCart_id', $userCart->id)->get();

            if ($carts->isNotEmpty()) {
                // Update existing cart entry
                $cart = $carts->first(); // Assuming you want to update the first matching cart
                $cart->quantity += $request->qty;
                $cart->totalPrice += $product->price * $request->qty;
                $cart->save();
            } else {
                // Create a new cart entry
                $shopCart = new AddtoCart();
                $shopCart->shopCart_id = $userCart->id;
                $shopCart->product_id = $request->product_id;
                $shopCart->productName = $product->productName;
                $shopCart->quantity = $request->qty;
                $shopCart->price = $product->price;
                $shopCart->totalPrice = $product->price * $request->qty;
                $shopCart->save();
            }
        }

        return back();
    }

    public function displayUserCart(){
        

        return view('ecommerce.cart');
    }
}
