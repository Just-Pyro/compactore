<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SwapPost;
use App\Models\SwapmeMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SwapPostController extends Controller
{
    public function getallPost(){
        
        $swapMedia = SwapmeMedia::all();

        $swapPosts = SwapPost::latest()->get();

        // $profiles = [];

        // foreach($swapPosts as $post){
        //     // dump($post['user_id']);
            
        //     $profiles[] = Profile::where('user_id', $post['user_id'])->first();
        // }

        // foreach($profiles as $profile){
        //     dump($profile->username);
        // }


        return view('trading.swapme', compact('swapPosts', 'swapMedia'));
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
            'description' => $request->description
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
}