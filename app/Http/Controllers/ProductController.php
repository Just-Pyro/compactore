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

        $user = auth()->user();
        $profile = $user->profile;
        $products = $user->shop->product;
        $productId = null;
        $shop = $user->shop;

        return view('seller.myProducts', compact('mediaFiles', 'profile','products', 'productId', 'shop'));
    }

    public function productPage($id){
        $product = Product::find($id);
        $shop = Shop::find($product->shop_id);
        $details = true;

        if($product){
            $shop = Shop::find($product->shop_id);

            $images = $product->mediaFile;

            return view('ecommerce.productPage',compact('product', 'images', 'shop', 'details'));
        }
        return back();
        
    }

    public function categoryProduct($cat){

        $results = Product::with('mediaFile')->where('category', $cat)->get();

        return view('ecommerce.category', compact('cat', 'results'));
    }

    public function gotoeditProduct(Request $request){
        $mediaFiles = MediaFile::with('product')
        ->orderBy('product_id')
        ->get()
        ->groupBy('product_id');

        $user = auth()->user();
        $profile = $user->profile;
        $products = $user->shop->product;
        $productId = $request->id;
        $editProduct = Product::find($productId);
        return view('seller.myProducts', compact('mediaFiles', 'profile','products', 'productId', 'editProduct'));
        
    }

    public function editProduct(Request $request){
        $product = Product::find($request->id);
        if($request->category == ""){
            $product->update([
                "productName" => $request->productName,
                "description" => $request->description,
                "stock" => $request->stock,
                "price" => $request->price
            ]);
        }else{
            $product->update([
                "productName" => $request->productName,
                "category" => $request->category,
                "description" => $request->description,
                "stock" => $request->stock,
                "price" => $request->price
            ]);
        }

        $user = auth()->user();
        $shop = $user->shop;
        $productImages = $request->file('productImg');

        if($request->deleteproductimg == 1){
            $deleteIMG = MediaFile::where('product_id', $request->id)->get();
            MediaFile::where('product_id', $request->id)->delete();

            foreach ($deleteIMG as $mediaFile) {
                $filePath = $mediaFile->file_path . $mediaFile->file_name;
                echo $filePath . "\n"; // Add this line to debug
                File::delete($filePath);
            }
        }
        
        if($productImages != null){
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
        }

        return redirect('/myProduct');
    }

    public function deleteProduct(Request $request){
        // i delete ang db record sa product media
        $deleteIMG = MediaFile::where('product_id', $request->id)->get();
        MediaFile::where('product_id', $request->id)->delete();

        // i delete ang file img sa iyang location
        foreach ($deleteIMG as $mediaFile) {
            $filePath = $mediaFile->file_path . $mediaFile->file_name;
            echo $filePath . "\n"; // Add this line to debug
            File::delete($filePath);
        }

        // i delete ang product sa db record
        Product::find($request->id)->delete();

        return redirect('/myProduct');
    }
}
