<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function addProduct(Request $request){
        $user = auth()->user();
        $shop = $user->shop;

        $product = Product::create([
            "shop_id" => $shop->id,
            "productName" => $request->productName,
            "category" => $request->category,
            "description" => $request->description,
            "stock" => $request->stock,
            "price" => $request->price
        ]);

        $productImages = $request->file('productImg');

        foreach($productImages as $index => $productImage){
            $originalName = pathinfo($productImage->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
            $extension = $productImage->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)
    
            $timestampCounter = time();//then gikuha ang current time
    
            $imageName = "{$shop->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

            $destinationPath = public_path('uploads/store/'.$shop->shopName.'/');//ang name sa folder nga sudlan sa media is ang name pud sa Shop

            if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
                File::makeDirectory($destinationPath, $mode = 0755, true, true);
            }
    
            $productImage->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan

            MediaFile::create([
                'product_id' => $product->id,
                'file_path' => 'uploads/store/'.$shop->shopName.'/',
                'file_name' => $imageName,
                'file_type' => $extension
            ]);
        }

        return redirect('/addProduct');
        
    }

    public function displaySellerProducts(){
        $mediaFiles = MediaFile::with('product')
        ->orderBy('product_id')
        ->get()
        ->groupBy('product_id');

        $profile = auth()->user()->profile;
        $products = $profile->shop->product;
        return view('seller.myProducts', compact('mediaFiles', 'profile','products'));
    }

    public function productPage($id){
        $product = Product::find($id);

        if($product){
            $shop = Shop::find($product->shop_id);

            $images = $product->mediaFile;

            return view('ecommerce.productPage',compact('product', 'images', 'shop'));
        }
        return back();
        
    }
}
