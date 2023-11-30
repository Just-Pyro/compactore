<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function check(){
        if(User::count() === 0){
            $user = User::create([
                'email' => 'admin@email.com',
                'password' => 'admin1234',
                'role' => 'admin',
                'status' => '1'
            ]);

        }

        $incorrect = "";

        if (auth()->check()) {
            if(auth()->user()->role != 'user'){
                if(auth()->user()->assignment == 'user'){
                    return redirect('/adminUser');
                } else if(auth()->user()->assignment == 'post'){
                    return redirect('/adminPost');
                } else if(auth()->user()->assignment == 'store'){
                    return redirect('/adminStore');
                } else {
                    return redirect('/adminVoucher');
                }
            }
            return redirect('/ecommerce');
        }
        return view('register', compact('incorrect'));
    }

    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function login(Request $request){
        $loginData = $request->validate([
            "loginEmail" => 'required|email',
            "loginPassword" => "required|min:8"
        ]);

        $rolesToCheck = ['user', 'admin', 'moderator'];
        $assignedToCheck = ['user', 'post', 'store', 'voucher'];

        foreach ($rolesToCheck as $role) {
                if (auth()->attempt(['email' => $loginData['loginEmail'], 'password' => $loginData['loginPassword'], 'role' => $role])) {
                    $request->session()->regenerate();
                    
                    if ($role == 'user') {
                        return redirect('/ecommerce');
                    } else if ($role == 'admin'){
                        return redirect('/admin');
                    } else {
                        $assignment = auth()->user()->assignment;
                        foreach($assignedToCheck as $assignment){
                            switch($assignment){
                                case 'user':
                                    return redirect('/adminUser');
                                break;

                                case 'post':
                                    return redirect('/adminPost');
                                break;

                                case 'store':
                                    return redirect('/adminStore');
                                break;

                                case 'voucher':
                                    return redirect('/adminVoucher');
                                break;
                            }
                        }

                    }
                }
        }
        $incorrect = "Inputs did not match in the database";

        return view('register', compact('incorrect'));
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
                'password' => $dataforUser['password'],
                'role' => 'user',
                'status' => '1'
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
