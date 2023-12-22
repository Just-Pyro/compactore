<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surplus;
use App\Models\SwapmeBookmark;
use App\Models\SurplusBookmarks;

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
        // $user = auth()->user();

        SwapmeBookmark::where("swapPost_id", $request->postIdBookmark)->first()->delete();

        // dump($request->postIdBookmark);

        return redirect('/swapme');
    }

    public function surplusBookmark(Request $request){
        $user = auth()->user();
        

        SurplusBookmarks::create([
            "user_id" => $user->id,
            "surplus_id" => $request->postIdBookmark,
        ]);

        $surplus = $user->surplusBookmark;

        // dump($surplus);

        // dump($request->postIdBookmark);
        $query = request('passQuery');
        $location = request('passlocation');
        // dump($results);
        $location = strtolower($location);
        if($query){
            if($location == ""){
                $results = Surplus::with('surplusMedia')->whereRaw('LOWER(productName) LIKE ?', ['%' . strtolower($query) . '%'])->get();
            }else{
                $results = Surplus::with('surplusMedia')
                ->whereRaw('LOWER(productName) LIKE ?', ['%' . strtolower($query) . '%'])
                ->whereRaw('LOWER(location) LIKE ?', ['%' . $location . '%'])
                ->get();
            }
        }else{
            $results = null;
        }

        return view('surplus.surplusSearchResult', compact('results', 'query', 'location', 'surplus'));
    }

    public function surplusUnBookmark(Request $request){
        $user = auth()->user();

        SurplusBookmarks::where("surplus_id", $request->postIdBookmark)->first()->delete();

        $surplus = $user->surplusBookmark;

        // dump($request->postIdBookmark);
        $query = $request->passQuery;
        $location = request('passlocation');
        // dump($results);

        $location = strtolower($location);
        if($query){
            if($location == ""){
                $results = Surplus::with('surplusMedia')->whereRaw('LOWER(productName) LIKE ?', ['%' . strtolower($query) . '%'])->get();
            }else{
                $results = Surplus::with('surplusMedia')
                ->whereRaw('LOWER(productName) LIKE ?', ['%' . strtolower($query) . '%'])
                ->whereRaw('LOWER(location) LIKE ?', ['%' . $location . '%'])
                ->get();
            }
        }else{
            $results = null;
        }

        return view('surplus.surplusSearchResult', compact('results', 'query', 'location', 'surplus'));
    }

    public function removeBookmarkSurplus(Request $request){
        $user = auth()->user();
        $bookmarks = $user->surplusBookmark;
        // dump($request->bookmarkSurplusId);
        foreach($bookmarks as $bookmark){
             SurplusBookmarks::where("surplus_id", $request->bookmarkSurplusId)->first()->delete();
        }

        return redirect('/surplusBookmarks');
    }
}
