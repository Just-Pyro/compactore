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
            // return response()->json(['redirect' => '/ecommerce'], 200);?
            return redirect('/ecommerce');
        }

        // return response()->json(['message' => 'Login attempt failed'], 401);
        return redirect('/');
    }
    public function register(Request $request){
        $dataforUser = $request->validate([
            'password'=> 'required|min:8|max:200',
            'email'=> 'required|email'
        ]);
        
        $dataforUser['password'] = Hash::make($dataforUser['password']);
        $user = User::create($dataforUser);
        auth()->login($user);

        if (auth()->check()) {
            $user_id = auth()->user()->id;
        
            $createProfile = new Profile();
            $createProfile->user_id = $user_id;
            $createProfile->username = $request->username;
            $createProfile->save();

        }
        
        return redirect('/ecommerce');
    }
}
