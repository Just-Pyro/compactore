<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SwapPost;
use App\Models\SwapmeMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SwapPostController extends Controller
{
    public function gotoswapProfile(){
        $user = auth()->user();
        $profile = $user->profile;
        // $address = ShippingAddress::all();
        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;
        
        return view('profile.swapProfile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
    }

    public function displaybookmarks(){
        $user = auth()->user();
        $profile = $user->profile;
        // $address = ShippingAddress::all();
        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;

        $bookMarks = $user->swapBookmark;
        // dump($bookMarks);
        $posts = [];
        $swapmedia = [];
        foreach($bookMarks as $bookmark){
            // dump($bookmark->swapPost_id);
            $posts[] = SwapPost::find($bookmark->swapPost_id);
            $swapmedia = SwapmeMedia::with('swapPost')
            ->orderBy('swapPost_id')
            ->get()
            ->groupBy('swapPost_id');
        }
        
        return view("trading.swapMeBookmark", compact('user', 'profile', 'address', 'addressId', 'addressUpdated', 'posts', 'swapmedia'));
    }

    public function getallPost(){
        // $breakLoop
        $swapMedia = SwapmeMedia::all();

        $swapPosts = SwapPost::latest()->get();

        $user = auth()->user();
        $swapPost = $user->swapBookmark;
        $offerPost = null;

        $query = null;
        $results = null;

        // dump($swapPost);

        return view('trading.swapme', compact('swapPosts', 'swapMedia', 'swapPost', 'offerPost', 'query', 'results'));
    }

    public function addPost(Request $request){
        $user = auth()->user();
        $profile = $user->profile;
        $swapPost = $user->swapPost;

        $swapPost = SwapPost::create([
            'user_id' => $user->id,
            'author' => $profile->username,
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'status' => '1'
        ]);


        $postImages = $request->file('postImg');



        foreach($postImages as $index => $postImage){
            $originalName = pathinfo($postImage->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
            $extension = $postImage->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)
    
            $timestampCounter = time();//then gikuha ang current time
    
            $imageName = "{$user->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

            $destinationPath = public_path('uploads/users/swapme/'.$profile->username.'/');//ang name sa folder nga sudlan sa media is ang name pud sa Shop

            if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
                File::makeDirectory($destinationPath, $mode = 0755, true, true);
            }
    
            $postImage->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan

            SwapmeMedia::create([
                'swapPost_id' => $swapPost->id,
                'file_path' => 'uploads/users/swapme/'.$profile->username.'/',
                'file_name' => $imageName,
                'file_type' => $extension
            ]);
        }

        return back();
    }

    public function openOfferForm($id){
        $swapMedia = SwapmeMedia::all();

        $swapPosts = SwapPost::latest()->get();

        $user = auth()->user();
        $swapPost = $user->swapBookmark;
        $offerPost = SwapPost::find($id);

        $query = null;
        $results = null;

        // dump($offerPost);

        return view('trading.swapme', compact('swapPosts', 'swapMedia', 'swapPost', 'offerPost', 'query', 'results'));
    }
}
