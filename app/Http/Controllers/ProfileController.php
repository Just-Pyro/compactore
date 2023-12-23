<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\GcashUserDetail;
use App\Models\SurplusReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function submitBio(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
    
        if (!$profile) {
            // If the user doesn't have a profile, create a new one
            $profile = Profile::create([
                'user_id' => $user->id,
                'bio' => $request->bio,
                // Add other fields as needed
            ]);
    
            return redirect('/profile')->with('success', 'Profile created successfully');
        }
    
        // If the user has a profile, update it
        $profile->update([
            'bio' => $request->bio,
            // Add other fields as needed
        ]);
    
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

    public function createUpdateProfile(Request $request){
        $user = auth()->user();
        $profile = $user->profile;

        if (!$profile) {
            // If the user doesn't have a profile, create a new one
            $profile = Profile::create([
                'user_id' => $user->id,
                'fullname' => $request->fullname,
                'phoneNumber' => $request->phoneNumber,
                'birthdate' => $request->birthdate,
                'gender' => $request->radioGender
                // Add other fields as needed
            ]);
    
            return redirect('/profile')->with('success', 'Profile created successfully');
        }
    
        // If the user has a profile, update it
        $profile->update([
            'fullname' => $request->fullname,
            'phoneNumber' => $request->phoneNumber,
            'birthdate' => $request->birthdate,
            'gender' => $request->radioGender
            // Add other fields as needed
        ]);
    
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

    public function createUpdateProfilePic(Request $request){
        $user = auth()->user();
        $profile = $user->profile;

        // Handle file upload and store the file in the public disk under the 'uploads/userprofile' directory
        // $imageName = $request->file('profilePic')->getClientOriginalName();
        // $request->file('profilePic')->move(public_path('uploads/userprofile'), $imageName);
        $originalName = pathinfo($request->file('profilePic')->getClientOriginalName(), PATHINFO_FILENAME);//first gikuha ang original name sa file
        $extension = $request->file('profilePic')->getClientOriginalExtension();//then gikuha ang iyang extension (e.g. jpg, png, jpeg, gif, ...)

        $timestampCounter = time();//then gikuha ang current time

        $imageName = "{$user->id}_{$originalName}_{$timestampCounter}.{$extension}";//then gisumpay nimo tanan

        $destinationPath = public_path('uploads/userprofile/');

        if (!File::isDirectory($destinationPath)) {//i check if nag exist ang folder, kung wala iya i create
            File::makeDirectory($destinationPath, $mode = 0755, true, true);
        }
        
        $request->file('profilePic')->move($destinationPath, $imageName);//lastly, gi move ang file sa designated nga butanganan

        if (!$profile) {
            // If the user doesn't have a profile, create a new one
            $profile = Profile::create([
                'user_id' => $user->id,
                'profileImg' => $imageName
            ]);
            return back()
            ->with('success', 'Image uploaded successfully.')
            ->with('imageName', $imageName);
        }

        $profile->update([
            'profileImg' => $imageName
        ]);

        return back()
            ->with('success', 'Image uploaded successfully.')
            ->with('imageName', $imageName);
    }

    public function saveGcash(Request $request){
        $user = auth()->user();

        $gcash = GcashUserDetail::create([
            'user_id' => $user->id,
            'number' => $request->gcashNumber,
            'fullname' => $request->gcashName,
            'email' => $request->gcashEmail
        ]);
        

        return back();
    }

    public function viewSurplusProfile($id){
        $user = auth()->user();
        $profile = $user->profile;

        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;
        // dump($id);
        if($profile->user_id == $id || $id == "id"){
            return view('profile.surplusProfile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
        }else{
            $otherUser = User::find($id);
            $otherProfile = Profile::where('user_id', $otherUser->id)->first();
            $reviews = SurplusReview::where('otherUser_id', $otherUser->id)->get();

            // dump($reviews);
            return view('profile.surplusProfileOtherSide', compact('otherUser', 'otherProfile', 'reviews'));
        }
        
    }
}
