<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurplusReview;
use App\Models\SwapmeReview;

class ReviewController extends Controller
{
    public function userReviewSurplus(Request $request){
        $user = auth()->user();
        $profile = $user->profile;
        $otherUser = $request->otherUserId;
        if($request->reviewDetails == null){
            $review = "";
        }else{
            $review = $request->reviewDetails;
        }

        // dump($request->star);

        SurplusReview::create([
            "user_id" => $user->id,
            "username" => $profile->username,
            "otherUser_id" => $otherUser,
            "reviewDetails" => $review,
            "rating" => $request->star,
            "profileImg" => $profile->profileImg,
        ]);

        return redirect("/surplusProfile/".$otherUser);
    }
}
