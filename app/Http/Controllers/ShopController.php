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

        $shop = Shop::create([
            'profile_id' => $profile->id,
            "shopName" => $request->storeName
        ]);
        
        $shop->save();

        return redirect('/userShop');
    }
}
