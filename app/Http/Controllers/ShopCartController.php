<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function add(Request $request){
        $user = auth()->user();

        $product = Product::find($request->product_id);
        $carts = ShopCart::where('product_id', $request->product_id)->where('user_id', $user->id)->get();
        // foreach($carts as $cart){
        //     if($cart->user_id == $user->id && $cart->product_id == $request->product_id){
        //         $carts = $cart;
        //         break;
        //     }
        // }

        // $shopCart = new ShopCart();
        
        // if($shopCart){//check if naa nabay data sulod ang shopcart table
        //     if($carts != null && $carts->user_id == $user->id){//i check if naay same nga product naka store sa database with the same user pud sa current nga naka logged in
        //         // $cart = ShopCart::find($request->product_id);
        //         $carts->user_id = $user->id;
        //         $carts->product_id = $request->product_id;
        //         $carts->productName = $product->productName;
        //         $carts->quantity = $carts->quantity + $request->qty;
        //         $carts->price = $product->price;
        //         $carts->totalPrice = $carts->totalPrice + ($product->price * $request->qty);
        //         $carts->save();

        //         return "naay the same id c product Quantity = {$carts->quantity}; totalPrice = {$carts->totalPrice}";
        //     }else{
        //         $shopCart->user_id = $user->id;
        //         $shopCart->product_id = $request->product_id;
        //         $shopCart->productName = $product->productName;
        //         $shopCart->quantity = $request->qty;
        //         $shopCart->price = $product->price;
        //         $shopCart->totalPrice = ($product->price * $request->qty);
        // $shopCart->save();

        //         return "wa nigana imong nested if + product Quantity = {$carts->quantity}; totalPrice = {$carts->totalPrice}";
        //     }
        // }else{
        //     $shopCart->user_id = $user->id;
        //     $shopCart->product_id = $request->product_id;
        //     $shopCart->productName = $product->productName;
        //     $shopCart->quantity = $request->qty;
        //     $shopCart->price = $product->price;
        //     $shopCart->totalPrice = ($product->price * $request->qty);
        // $shopCart->save();

        //     return "ari lng sa ko";
        // }

        if ($carts->isNotEmpty()) {
            // Update existing cart entry
            $cart = $carts->first(); // Assuming you want to update the first matching cart
            $cart->quantity += $request->qty;
            $cart->totalPrice += $product->price * $request->qty;
            $cart->save();
        } else {
            // Create a new cart entry
            $shopCart = new ShopCart();
            $shopCart->user_id = $user->id;
            $shopCart->product_id = $request->product_id;
            $shopCart->productName = $product->productName;
            $shopCart->quantity = $request->qty;
            $shopCart->price = $product->price;
            $shopCart->totalPrice = $product->price * $request->qty;
            $shopCart->save();
        }

        return back();
    }
}
