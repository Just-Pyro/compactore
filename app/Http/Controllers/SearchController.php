<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $results = Product::where('productName', 'LIKE', '%' . $query . '%')->get();

        return view('ecommerce.searchPage', compact('results', 'query'));
    }
}
