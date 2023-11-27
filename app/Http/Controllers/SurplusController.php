<?php

namespace App\Http\Controllers;

use App\Models\Surplus;
use App\Models\SurplusMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SurplusController extends Controller
{
    public function postSurplus(Request $request){
        $user = auth()->user();
        $profile = $user->profile;

        $surplus = Surplus::create([
            'user_id' => $user->id,
            'productName' => $request->productName,
            'condition' => $request->condition,
            'price' => $request->price,
            'brand' => $request->brand,
            'description' => $request->description,
        ]);

        $postImages = $request->file('postImg');



        foreach($postImages as $index => $postImage){
            $originalName = pathinfo($postImage->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
            $extension = $postImage->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)
    
            $timestampCounter = time();//then gikuha ang current time
    
            $imageName = "{$user->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

            $destinationPath = public_path('uploads/users/surplus/'.$profile->username.'/');//ang name sa folder nga sudlan sa media is ang name pud sa Shop

            if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
                File::makeDirectory($destinationPath, $mode = 0755, true, true);
            }
    
            $postImage->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan

            SurplusMedia::create([
                'surplus_id' => $surplus->id,
                'file_path' => 'uploads/users/surplus/'.$profile->username.'/',
                'file_name' => $imageName,
                'file_type' => $extension
            ]);
        }

        return back();
    }
}
