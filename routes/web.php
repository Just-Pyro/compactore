<?php

use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {//nagamit
    if (Auth::check()) {
        return redirect('/ecommerce');
    }
    return view('register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);//nagamit
Route::post('/logout', [UserController::class,'logout']);//nagamit
Route::post('/login', [UserController::class,'login']);//nagamit

//ecommerce
Route::get('/ecommerce', function() {
    $user = auth()->user();
    $profile = $user->profile;
    return view('ecommerce.ecommerce', ['user'=>$user, 'profile' => $profile]);
});

Route::get('/cart', function(){
    return view('ecommerce.cart');
});

Route::get('/searchPage', function(){
    return view('ecommerce.searchPage');
})->name('searchPage');

Route::get('/productPage', function(){
    return view('ecommerce.productPage');
});

Route::get('/category', function(){
    return view('ecommerce.category');
});

Route::get('/checkOut', function(){
    return view('ecommerce.checkOut');
});

// all Profile
Route::get('/profile', function(){//nagamit
    $user = auth()->user();
    $profile = $user->profile;
    return view('profile.profile', ['user'=>$user, 'profile' => $profile]);
});

Route::post('/saveBio', [ProfileController::class, 'submitBio']);//nagamit
Route::post('/create-updateProfile', [ProfileController::class, 'createUpdateProfile']);//nagamit
Route::post('/create-updateProfilePic', [ProfileController::class, 'createUpdateProfilePic']);//nagamit

Route::get('/ecommerceProfile', function(){
    return view('profile.ecommerceProfile');
});

Route::get('/swapProfile', function(){
    return view('profile.swapProfile');
});

Route::get('/surplusProfile', function(){
    return view('profile.surplusProfile');
});

//change Pass
Route::get('/changePassword', function(){
    return view('others.changePassword');
});

//surplus
Route::get('/surplus', function(){
    return view('surplus.surplus');
});

Route::get('/searchResult', function(){
    return view('surplus.surplusSearchResult');
})->name('surplusSearchResult');

Route::get('/surplusProductPage', function(){
    return view('surplus.surplusProductPage');
});

//swapme
Route::get('/swapme', function(){
    return view('trading.swapme');
});