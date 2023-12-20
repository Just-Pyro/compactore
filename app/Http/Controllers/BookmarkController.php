<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwapPost;
use App\Models\SwapmeBookmark;

class BookmarkController extends Controller
{
    public function swapmeBookmark(Request $request){
        $user = auth()->user();

        SwapmeBookmark::create([
            "user_id" => $user->id,
            "swapPost_id" => $request->postIdBookmark,
        ]);

        // dump($request->postIdBookmark);

        return redirect('/swapme');
    }

    public function swapmeUnBookmark(Request $request){
        $user = auth()->user();

        SwapmeBookmark::where("swapPost_id", $request->postIdBookmark)->first()->delete();

        // dump($request->postIdBookmark);

        return redirect('/swapme');
    }
}
