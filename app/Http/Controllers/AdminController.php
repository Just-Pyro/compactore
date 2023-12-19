<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\voucher;

class AdminController extends Controller
{
    public function addModerator(Request $request){
        $dataInput = $request->validate([
            "moderatorEmail" => 'required|email',
            "moderatorPassword" => "required|min:8",
        ]);

        if($dataInput){
            User::create([
                'email' => $dataInput['moderatorEmail'],
                'password' => $dataInput['moderatorPassword'],
                'role' => 'moderator',
                'assignment' => $request->assignment,
                'status' => '1'
            ]);

            $moderators = User::where('role', 'moderator')->get();
            return view('admin.adminDashboard', compact('moderators'));
        }

    }

    public function deleteModerator(Request $request){
        $toDelete = User::find($request->id);
        $toDelete->delete();
    }

    public function displayVouchers(){
        $shop = Shop::where('shopName', 'admin')->first();
        $vouchers = voucher::where('shop_id', $shop->id)->get();
        $role = auth()->user()->role;

        return view('admin.addVoucher', compact('vouchers', 'role'));
    }

    public function displayModerators(){
        $moderators = User::where('role', 'moderator')->get();
        return view('admin.adminDashboard', compact('moderators'));
    }

    public function displayUserList(){
        $users = User::where('role', 'user')->get();
        return view('admin.userList', compact('users'));
    }

    public function displayReportedUsers() {
        $role = auth()->user()->role;

        return view('admin.userReport', compact('role'));
    }

    public function displayReportedPosts() {
        $role = auth()->user()->role;

        return view('admin.postReport', compact('role'));
    }

    public function displayReportedStores() {
        $role = auth()->user()->role;

        return view('admin.storeReport', compact('role'));
    }
}
