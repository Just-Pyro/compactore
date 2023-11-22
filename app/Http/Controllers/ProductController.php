<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function addProduct(Request $request){
        $user = auth()->user();
        $shop = $user->profile->shop;

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

            $destinationPath = public_path('uploads/store/'.$shop->shopName.'/');

            if (!File::isDirectory($destinationPath)) {
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
}
