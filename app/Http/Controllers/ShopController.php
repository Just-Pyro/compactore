<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Profile;
use App\Models\Product;
use App\Models\MediaFile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function createShop(Request $request){
        $user = auth()->user();
        $profile = $user->profile;
        $shop = $profile->shop;

        //creates a shop for the user
        $shop = Shop::create([
            'user_id' => $user->id,
            "shopName" => $request->storeName,
            "contact" => $request->contact
        ]);
        $shop->save();

        // $productImage = $request->storeImg;

        $originalName = pathinfo($request->file('storeImg')->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
        $extension = $request->file('storeImg')->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)

        $timestampCounter = time();//then gikuha ang current time

        $imageName = "{$shop->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

        $destinationPath = public_path('uploads/storeProfile/');

        if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
            File::makeDirectory($destinationPath, $mode = 0755, true, true);
        }
        
        $request->file('storeImg')->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan

        //updates Shopstatus in profile table
        $profile->update([
            "shopStatus" => 1
        ]);

        $shop->update([
            "shopImg" => $imageName,
        ]);

        //proceed to the newly opened shop of the user
        return redirect('/CompactoreSeller');
    }

    public function showStore($id){
        $user = auth()->user();
        $id = (int)$id;
        $shop = Shop::find($id);
        $products = Product::where('shop_id', $shop->id)->get();

        $mediaFiles = [];

        foreach($products as $product){
            // dump($product->id);
            $mediaFiles[] = MediaFile::where('product_id', $product->id)->get();
        }
        // dump($mediaFiles);
        return view('ecommerce.showStore', compact('shop', 'products', 'mediaFiles', 'user'));
    }
}
