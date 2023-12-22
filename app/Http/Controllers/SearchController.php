<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaFile;
use App\Models\SwapPost;
use App\Models\SwapmeMedia;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('ecommerce.searchPage');
    }

    public function search()
    {
        $query = request('query');
        $results = Product::with('mediaFile')->where('productName', 'LIKE', '%' . $query . '%')->get();

        return view('ecommerce.searchPage', compact('results', 'query'));
    }

    public function searchSwapme(){
        $query = request('query');
        $results = SwapPost::with('swapMedia')->where('title', 'LIKE', '%' . $query . '%')->get();

        $swapMedia = SwapmeMedia::all();

        $swapPosts = SwapPost::latest()->get();

        $user = auth()->user();
        $swapPost = $user->swapBookmark;
        $offerPost = null;

        // dump($results);

        return view('trading.swapme', compact('swapPosts', 'swapMedia', 'swapPost', 'offerPost', 'results', 'query'));
    }
}
