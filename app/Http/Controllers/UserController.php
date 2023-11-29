<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function login(Request $request){
        $loginData = $request->validate([
            "loginEmail" => 'required|email',
            "loginPassword" => "required|min:8"
        ]);

        if(auth()->attempt(['email'=> $loginData['loginEmail'],'password'=> $loginData['loginPassword']])){
            $request->session()->regenerate();
            return redirect('/ecommerce');
        }

        return redirect('/');
    }
    public function register(Request $request){
        $dataforUser = $request->validate([
            'password'=> 'required|confirmed|min:8',
            'email'=> 'required|email|unique:users',
            'username' => 'required|unique:profiles'
        ]);

        $dataforUser['password'] = Hash::make($dataforUser['password']);
        $username = $dataforUser['username'];


        if($dataforUser){
            $user = User::create([
                'email' => $dataforUser['email'],
                'password' => $dataforUser['password']
            ]);
            auth()->login($user);

            if (auth()->check()) {
                $user_id = auth()->user()->id;
            
                $createProfile = new Profile();
                $createProfile->user_id = $user_id;
                $createProfile->username = $username;
                $createProfile->save();
                return redirect('/ecommerce');
            }
        }
        
        return redirect('/');
        
    }
}
