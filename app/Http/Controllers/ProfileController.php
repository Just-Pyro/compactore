<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

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
                'bio' => $request->input('bio'),
                // Add other fields as needed
            ]);
    
            return redirect('/profile')->with('success', 'Profile created successfully');
        }
    
        // If the user has a profile, update it
        $profile->update([
            'bio' => $request->input('bio'),
            // Add other fields as needed
        ]);
    
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

}
