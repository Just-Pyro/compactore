<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $originalName = pathinfo($request->file('profilePic')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('profilePic')->getClientOriginalExtension();

        $timestampCounter = time();

        $imageName = "{$user->id}_{$originalName}_{$timestampCounter}.{$extension}";

        $request->file('profilePic')->move(public_path('uploads/userprofile'), $imageName);

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
}
