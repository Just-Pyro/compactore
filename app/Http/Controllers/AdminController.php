<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function addModerator(Request $request){
        $dataInput = $request->validate([
            "moderatorEmail" => 'required|email',
            "moderatorPassword" => "required|min:8",
        ]);

        if($dataInput){
            $moderator = User::create([
                'email' => $dataInput['moderatorEmail'],
                'password' => $dataInput['moderatorPassword'],
                'role' => 'moderator',
                'assignment' => $request->assignment,
                'status' => '1'
            ]);


            return view('admin.adminDashboard');
        }

    }
}
