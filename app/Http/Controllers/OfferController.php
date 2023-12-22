<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwapPost;
use App\Models\Offer;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    public function addOffer(Request $request){
        $user = auth()->user();
        $profile = $user->profile;
        $post = SwapPost::find($request->postId);

        dump($post);
        $offer = Offer::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'itemName' => $request->itemName,
            'description' => $request->description,
        ]);
        $offer->save();

        $originalName = pathinfo($request->file('postImg')->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
        $extension = $request->file('postImg')->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)

        $timestampCounter = time();//then gikuha ang current time

        $imageName = "{$offer->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

        $destinationPath = public_path('uploads/users/swapme/'.$profile->username.'/offers/');

        if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
            File::makeDirectory($destinationPath, $mode = 0755, true, true);
        }
        
        $request->file('postImg')->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan


        $offer->update([
            "itemImg" => $imageName,
        ]);

        return redirect('/swapme');
    }
}
