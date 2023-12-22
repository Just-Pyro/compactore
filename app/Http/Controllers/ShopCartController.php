<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\voucher;
use App\Models\Product;
use App\Models\ShopCart;
use App\Models\AddtoCart;
use App\Models\MediaFile;
use Illuminate\Support\Str;
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
        $user = auth()->user();
        $cart = $user->cart;
        $admin = Shop::first();

        $details = true;

        // $vouchers = voucher::whereNotIn('id', [$admin->id])->get();
        $vouchers = voucher::all();

        if($cart){
            //this will return a collection
            $addtoCart = AddtoCart::where('shopCart_id', $cart->id)->get();

            $cartProducts = [];
            $productImages = [];
            $shop = null;
            
            //mo loop ka sa collection and then i store nimo sa $cartProducts
            foreach ($addtoCart as $key => $value) {
                $cartProducts[$key] = $value->toArray();

                $images = MediaFile::where('product_id', $value['product_id'])->first();
                $product = Product::find($value['product_id']);
                $shop = Shop::find($product->shop_id);

                $productImages[$key] = $images;
            }

            $address = auth()->user()->address()->latest()->get();
            $addressId = null;
            $addressUpdated = null;

            return view('ecommerce.cart', compact("cartProducts", "productImages", "shop", "address", 'addressId', 'addressUpdated', 'vouchers', 'details'));
        }

        $cartProducts = null;
        $address = auth()->user()->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;

        // dump($cart);

        return view('ecommerce.cart', compact("cartProducts", 'address', 'addressId', 'addressUpdated', 'vouchers', 'cart'));
    }

    public function checkout($ids){
        $user = auth()->user();
        $profile = $user->profile;
        if($profile->fullname == null || $profile->phoneNumber == null || $profile->birthdate == null || $profile->profileImg == null || $profile->gender == null){
            $details = false;
            
            $cart = $user->cart;
            $admin = Shop::first();

            // $vouchers = voucher::whereNotIn('id', [$admin->id])->get();
            $vouchers = voucher::all();

            if($cart){
                //this will return a collection
                $addtoCart = AddtoCart::where('shopCart_id', $cart->id)->get();

                $cartProducts = [];
                $productImages = [];
                $shop = null;
                
                //mo loop ka sa collection and then i store nimo sa $cartProducts
                foreach ($addtoCart as $key => $value) {
                    $cartProducts[$key] = $value->toArray();

                    $images = MediaFile::where('product_id', $value['product_id'])->first();
                    $product = Product::find($value['product_id']);
                    $shop = Shop::find($product->shop_id);

                    $productImages[$key] = $images;
                }

                $address = auth()->user()->address()->latest()->get();
                $addressId = null;
                $addressUpdated = null;

                return view('ecommerce.cart', compact("cartProducts", "productImages", "shop", "address", 'addressId', 'addressUpdated', 'vouchers', 'details'));
            }

            $cartProducts = null;
            $address = auth()->user()->address()->latest()->get();
            $addressId = null;
            $addressUpdated = null;

            // dump($cart);

            return view('ecommerce.cart', compact("cartProducts", 'address', 'addressId', 'addressUpdated', 'vouchers', 'cart'));

        }else{
            $ids = explode(',', $ids);
            $idArray = [];
     
            foreach($ids as $id){
                $idArray[] = Str::after($id, "-");
                // dump($idArray);
            }
    
            // dump(count($idArray));
    
            $forCheckout = [];
            $images = [];
            $products = [];
            foreach($idArray as $i => $id){
                $addtoCart = AddtoCart::find($id);
                // dump($addtoCart->product_id);
                $product = Product::find($addtoCart->product_id);
                // ->where('product_id', $addtoCart->product_id)
                // $products[] = $addtoCart->product_id;
                $images[] = $product->mediaFile->first();
                // dump($images);
    
                $forCheckout[] = $addtoCart;
            }
    
            $address = auth()->user()->address()->latest()->get();
            $addressId = null;
            $addressUpdated = null;
    
            $admin = Shop::first();
    
            // $vouchers = voucher::whereNotIn('id', [$admin->id])->get();
            $vouchers = voucher::all();
    
            $Subtotal = null;
            return view('ecommerce.checkOut', compact('forCheckout', 'images', 'Subtotal', 'address', 'addressId', 'addressUpdated','vouchers'));
        }
        // dump($ids);

        
    }

    public function buyNow($id){
        $user = auth()->user();
        $profile = $user->profile;
        if($profile->fullname == null || $profile->phoneNumber == null || $profile->birthdate == null || $profile->profileImg == null || $profile->gender == null){
            $details = false;
            
            $product = Product::find($id);
            $shop = Shop::find($product->shop_id);

            if($product != null){
                $shop = Shop::find($product->shop_id);

                $images = $product->mediaFile;

                // dump('im here');
                return view('ecommerce.productPage',compact('product', 'images', 'shop', 'details'));
            }
            // return back();
        }else{
            // $id = (int)$id;

            $forCheckout = [];
            $images = [];
            $products = [];
            // dump($id);
            $addtoCart = AddtoCart::where('product_id', $id)->first();
            // dump($addtoCart);
            $product = Product::find($id);
            $images[] = $product->mediaFile->first();
            // dump($images);

            $forCheckout[] = $addtoCart;
    
            $address = auth()->user()->address()->latest()->get();
            $addressId = null;
            $addressUpdated = null;
    
            $vouchers = voucher::all();
    
            $Subtotal = null;
            return view('ecommerce.checkOut', compact('forCheckout', 'images', 'Subtotal', 'address', 'addressId', 'addressUpdated','vouchers'));
        }
        // dump($ids);

        
    }
}