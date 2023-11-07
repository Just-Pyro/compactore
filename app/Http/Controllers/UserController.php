<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $dataforUser = $request->validate([
            'password'=> ['required', 'min:8','max:200'],
            'email'=> ['required','email']
        ]);

        $un = $request->validate([
            'username' => ['required', 'min:5', 'max:12'],
        ]);

        $dataforUser['password'] = Hash::make($dataforUser['password']);

        $user = User::create($dataforUser);
        $user->profile()->create($un);

        auth()->login($user);
        return redirect('/');
    }
}
