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
        // $user = auth()->user();
        // $profile = $user->profile;

        // if (!$profile) {
        //     // If the user doesn't have a profile, create a new one
        //     $profile = Profile::create([
        //         'user_id' => $user->id,
        //     ]);
    
        // }
    
        // // Handle file upload and store the file in the public disk under the 'profile_pictures' directory
        // $imageName = $request->file('profilePic')->store('userProfilePic', 'public');

        // // Update the profile with the new profile picture
        // $profile->update(['profilePic' => basename($imageName)]);

        // return redirect('/profile')->with('success', 'Profile picture updated successfully');

        try {
            $user = auth()->user();
            $profile = $user->profile;
    
            if (!$profile) {
                $profile = Profile::create([
                    'user_id' => $user->id,
                ]);
            }
    
            $request->validate([
                'profilePic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Log information before file upload
            Log::info('Before file upload - User ID: ' . $user->id);
    
            // Store the file in the 'public/userProfileImg' directory
            $imageName = $request->file('profilePic')->store('userProfileImg', 'public');
    
            // Log information after successful file upload
            Log::info('After file upload - User ID: ' . $user->id . ' - Image Name: ' . basename($imageName));
    
            $profile->update(['profilePic' => basename($imageName)]);
    
            return redirect('/profile')->with('success', 'Profile picture updated successfully');
        } catch (\Exception $e) {
            // Log any exceptions that might occur
            Log::error('Exception during file upload: ' . $e->getMessage());
    
            // Handle the exception or return an error response
            return redirect('/profile')->with('error', 'Failed to update profile picture');
        }
    
    }
}
