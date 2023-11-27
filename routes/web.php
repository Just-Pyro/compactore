<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurplusController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\SwapPostController;

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
Route::get('/ecommerce', function() {//nagamit
    return view('ecommerce.ecommerce');
});

//forSearching Ecomerce
Route::get('/search',[SearchController::class,'search'])->name('search');//nagamit

Route::get('/cart', [ShopCartController::class,'displayUserCart']);//nagamit

Route::get('/productPage/{id}', [ProductController::class, 'productPage']);//nagamit
Route::post('/add-to-cart', [ShopCartController::class, 'add']);//nagamit


Route::get('/category', function(){
    return view('ecommerce.category');
});

Route::get('/checkOut/{ids}',[ShopCartController::class, 'checkout']);//nagamit

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
Route::post('/addVoucher',[VoucherController::class, 'addVoucher']);//nagamit


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
Route::get('/searchResult', [SurplusController::class, 'search'])->name('surplusSearchResult');
Route::get('/surplusProductPage/{id}', [SurplusController::class, 'displayProduct']);
Route::post('/postSurplus', [SurplusController::class, 'postSurplus']);

//swapme
Route::get('/swapme', [SwapPostController::class, 'getallPost']);//nagamit
Route::post('/addPost', [SwapPostController::class, 'addPost']);//nagamit