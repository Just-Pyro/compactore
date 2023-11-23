<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return redirect('/');
        }
        return redirect("/");
    }
    public function register(Request $request){
        $dataforUser = $request->validate([
            'username'=> ['required', 'min:5', 'max:12'],
            'password'=> ['required', 'min:8','max:200'],
            'email'=> ['required','email']
        ]);

        $dataforUser['password'] = Hash::make($dataforUser['password']);
        $user = User::create($dataforUser);
        auth()->login($user);
        
        return redirect('/ecommerce');
    }
}
