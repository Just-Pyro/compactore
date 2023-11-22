<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoucherController;

Route::get('/', function () {//nagamit
    if (Auth::check()) {
        return redirect('/ecommerce');
    }
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);//nagamit
Route::post('/logout', [UserController::class,'logout']);//nagamit
Route::post('/login', [UserController::class,'login']);//nagamit

//ecommerce
Route::get('/ecommerce', function() {
    return view('ecommerce.ecommerce');
});

//forSearchin Ecomerce
Route::get('/search',[SearchController::class,'search'])->name('search');

Route::get('/cart', function(){
    return view('ecommerce.cart');
});

// Route::get('/searchPage', function(){
//     return view('ecommerce.searchPage');
// })->name('searchPage');

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

//for Users Shop
Route::post('/openStore', [ShopController::class, 'createShop']);//nagamit
Route::get('/CompactoreSeller', function(){//nagamit
    $profile = auth()->user()->profile;
    return view('seller.sellerPage', ['profile'=>$profile]);
});
Route::get('/addProduct', function(){//nagamit
    $profile = auth()->user()->profile;
    return view('seller.addProducts', ['profile'=>$profile]);
});
Route::post('/addProduct-ecommerce', [ProductController::class, 'addProduct']);//nagamit
Route::get('/myProduct', [ProductController::class, 'displaySellerProducts']);//nagamit

//for vouchers
Route::get('/goto-addVoucher', function(){
    $profile = auth()->user()->profile;
    return view('seller.addVouchers',['profile'=>$profile]);//nagamit
});
Route::post('/addVoucher',[VoucherController::class, 'addVoucher']);


//adminn
Route::get('/adminLogin', function(){//nagamit
    return view('admin.adminLogin');
});
Route::get('/adminDashboard', function(){//nagamit
    return view('admin.adminDashboard');
});
Route::get('/addVoucher-admin',function(){//nagamit
    return view('admin.addVoucher');
});



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