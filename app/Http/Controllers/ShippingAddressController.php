<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Models\Profile;

class ShippingAddressController extends Controller
{
    public function addDeliveryAddress(Request $request){
        $user = auth()->user();

        if($user->address->count() == 0){
            $address = ShippingAddress::create([
                'user_id' => $user->id,
                'fullname' => $request->fullname,
                'contact' => $request->contact,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'postal' => $request->postal,
                'detailed_address' => $request->details,
                'status' => 1,
            ]);
        }else{
            $address = ShippingAddress::create([
                'user_id' => $user->id,
                'fullname' => $request->fullname,
                'contact' => $request->contact,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'postal' => $request->postal,
                'detailed_address' => $request->details,
                'status' => 0,
            ]);
        }
        

        return back();
    }

    public function editDeliveryAddress(Request $request){
        // $address = ShippingAddress::find($request->id);
        ShippingAddress::where('id', $request->id)->update([
            'fullname' => $request->fullname,
            'contact' => $request->contact,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'postal' => $request->postal,
            'detailed_address' => $request->details,
        ]);

        $user = auth()->user();
        $profile = $user->profile;
        // $address = ShippingAddress::all();
        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = 'updated';

        return view('profile.profile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
    }

    public function displayDeliveryAddresses(){
        $user = auth()->user();
        $profile = $user->profile;
        // $address = ShippingAddress::all();
        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;


        return view('profile.profile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
    }

    public function getData($id){
        $user = auth()->user();
        $profile = $user->profile;
        // dump($profile);
        // $addressId = [];
        // $address = ShippingAddress::all();
        $address = $user->address()->latest()->get();
        $addressId = ShippingAddress::find($id);
        $addressUpdated = null;
        // Use the ID to fetch data from the database
        // Perform database query here...

        // Return the retrieved data as the response
        
        return view('profile.profile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
    }

    public function deleteData($id){
        $deleteAddress = ShippingAddress::find($id)->delete();

        $user = auth()->user();
        $profile = $user->profile;
        $address = $user->address()->latest()->get();
        $addressId = null;
        $addressUpdated = null;
        // Use the ID to fetch data from the database
        // Perform database query here...

        // Return the retrieved data as the response
        
        return back()->with(compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
    }
}