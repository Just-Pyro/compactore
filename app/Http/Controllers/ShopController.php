<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Profile;
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

        //updates Shopstatus in profile table
        $profile->update([
            "shopStatus" => 1
        ]);

        //proceed to the newly opened shop of the user
        return redirect('/CompactoreSeller');
    }
}
