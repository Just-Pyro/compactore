<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Surplus;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Str;
use App\Models\SurplusMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SurplusController extends Controller
{
    public function displaybookmarks(){
        $user = auth()->user();
        $profile = $user->profile;

        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;

        $bookMarks = $user->surplusBookmark;
        $posts = [];
        $surplusmedia = [];

        foreach($bookMarks as $bookmark){
            $posts[] = Surplus::find($bookmark->surplus_id);
            $surplusmedia = SurplusMedia::with('surplus')
            ->orderBy('surplus_id')
            ->get()
            ->groupBy('surplus_id');
        }

        $users = [];
        foreach($posts as $post){
            $users[] = Profile::where('user_id', $post->user_id)->first();
        }

        return view("surplus.surplusBookmark", compact('user', 'profile', 'address', 'addressId', 'addressUpdated', 'posts', 'surplusmedia', 'users'));
    }

    public function postSurplus(Request $request){
        $user = auth()->user();
        $profile = $user->profile;

        $surplus = Surplus::create([
            'user_id' => $user->id,
            'productName' => $request->productName,
            'condition' => $request->condition,
            'price' => $request->price,
            'location' => $request->location,
            'brand' => $request->brand,
            'description' => $request->description,
            'status' => '1'
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

    public function search(){
        $user = auth()->user();
        $surplus = $user->surplusBookmark;
        
        $query = request('query');
        $location = request('location');
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

        // dump($surplus);
        // foreach($surplus as $item){
        //     dump($item);
        // }
        
        return view('surplus.surplusSearchResult', compact('results', 'query', 'location', 'surplus'));
    }

    public function displayProduct($id){


        $product = Surplus::find($id); // pangitaon ang row sa surplus nga item
        $user = User::find($product->user_id);
        $profile = Profile::where("user_id", $user->id)->first();
        
        if($product){

            $images = $product->surplusMedia;
            $conditionDesc = null;

            switch($product->condition){
                case 'Like new':
                    $conditionDesc = "Used once or twice. As good as new.";
                    break;
                
                case 'Lightly used':
                    $conditionDesc = "Used with care. Flaws, if any, are barely noticeable.";
                    break;

                case 'Well used':
                    $conditionDesc = "Has minor flaws or defects.";
                    break;

                case 'Heavily Used':
                    $conditionDesc = "Has obvious signs of use or defects.";
                    break;
            }

            return view('surplus.surplusProductPage',compact('product', 'images', 'conditionDesc', 'profile'));
        }
        return back();
    }
}
