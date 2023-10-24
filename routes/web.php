<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::post('/ecommerce', function() {
    return view('ecommerce.ecommerce');
});

Route::get('/ecommerce', function() {
    return view('ecommerce.ecommerce');
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
Route::get('/profile', function(){
    return view('profile.profile');
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

//swapme
Route::get('/swapme', function(){
    return view('trading.swapme');
});