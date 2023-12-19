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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingAddressController;
use App\Models\ShippingAddress;

Route::get('/', [UserController::class, 'check']);

Route::post('/register', [UserController::class, 'register']);//nagamit
Route::post('/logout', [UserController::class,'logout']);//nagamit
Route::post('/login', [UserController::class,'login']);//nagamit

//admin
Route::get('/admin', [AdminController::class, 'displayModerators']);
Route::get('/adminUserList', [AdminController::class, 'displayUserList']);
Route::post('/addModerator', [AdminController::class, 'addModerator']);//nagamit
Route::get('/adminUser', [AdminController::class, 'displayReportedUsers']);//nagamit
Route::get('/adminPost', [AdminController::class, 'displayReportedPosts']);//nagamit
Route::get('/adminStore', [AdminController::class, 'displayReportedStores']);//nagamit
Route::get('/adminVoucher', [AdminController::class, 'displayVouchers']);//nagamit

// moderators
Route::post('/deletemoderator', [AdminController::class, 'deleteModerator']);


//ecommerce
Route::get('/ecommerce', function() {//nagamit
    return view('ecommerce.ecommerce');
});

//forSearching Ecomerce
Route::get('/search',[SearchController::class,'search'])->name('search');//nagamit

Route::get('/cart', [ShopCartController::class,'displayUserCart']);//nagamit

Route::get('/productPage/{id}', [ProductController::class, 'productPage']);//nagamit
Route::get('/showStore/{id}',[ShopController::class, 'showStore']);
Route::post('/add-to-cart', [ShopCartController::class, 'add']);//nagamit


Route::get('/category/{category}', [ProductController::class, 'categoryProduct']);

Route::get('/checkOut/{ids}',[ShopCartController::class, 'checkout']);//nagamit

// all Profile
Route::get('/profile', function(){//nagamit
    $user = auth()->user();
    $profile = $user->profile;
    // $address = ShippingAddress::all();
    $address = $user->address()->latest()->get();
    $addressId = null;
    $addressUpdated = null;

    return view('profile.profile', compact('user', 'profile', 'address', 'addressId', 'addressUpdated'));
});

Route::post('/addDeliveryAddress', [ShippingAddressController::class, 'addDeliveryAddress']);//nagamit
Route::get('/get-data/{id}', [ShippingAddressController::class, 'getData']);//nagamit
Route::get('/delete-data/{id}', [ShippingAddressController::class, 'deleteData']);//nagamit
Route::post('/editDeliveryAddress', [ShippingAddressController::class, 'editDeliveryAddress']);//nagamit
Route::post('/saveBio', [ProfileController::class, 'submitBio']);//nagamit
Route::post('/create-updateProfile', [ProfileController::class, 'createUpdateProfile']);//nagamit
Route::post('/create-updateProfilePic', [ProfileController::class, 'createUpdateProfilePic']);//nagamit
Route::get('/set-gcash', function(){
    $user = auth()->user();
    $profile = $user->profile;
    $gcash = $user->gcash;
    return view('profile.profileGcash', ['user'=>$user, 'profile' => $profile, 'gcash' => $gcash]);
});
Route::post('/saveGcash', [ProfileController::class, 'saveGcash']);

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
Route::get('/gotoeditProduct-ecommerce', [ProductController::class, 'gotoeditProduct']);//nagamit
Route::post('/editProduct-ecommerce', [ProductController::class, 'editProduct']);//nagamit
Route::post('/deleteProduct-ecommerce', [ProductController::class, 'deleteProduct']);//nagamit
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
Route::get('/searchResult', [SurplusController::class, 'search'])->name('surplusSearchResult');//nagamit
Route::get('/surplusProductPage/{id}', [SurplusController::class, 'displayProduct']);//nagamit
Route::post('/postSurplus', [SurplusController::class, 'postSurplus']);//nagamit

//swapme
Route::get('/swapme', [SwapPostController::class, 'getallPost']);//nagamit
Route::post('/addPost', [SwapPostController::class, 'addPost']);//nagamit

//payment
Route::get('/create-session', [CheckoutController::class, 'createSession']);
Route::post('/checkoutOrder', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');//nagamit
Route::get('/checkout/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');//nagamit
Route::get('/checkout/failed', [CheckoutController::class, 'checkoutFailed'])->name('checkout.failed');