<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// users
Route::view('users/login','website.auth.login')->name('users.login');
Route::view('users/register','website.auth.register')->name('users.register');
Route::view('users/forget-password','website.auth.passwords.email')->name('users.forget_password');
Route::post('users/send-email','UserController@sendemail')->name('users.send_email');
Route::get('users/reset-password/{email}/{token}','UserController@showResetPasswordForm')->name('users.show_reset_password_form');
Route::post('users/update-password','UserController@submitResetPasswordForm')->name('users.submit_reset_password_form');


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function(){
    Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::group(['middleware' => [ 'auth']
    ],function(){
        
        // product cart
        Route::get('cart/list','CartController@cartList')->name('products.cart');
        Route::post('cart', 'CartController@addToCart')->name('cart.store');        
        Route::post('update-cart', 'CartController@updateCart')->name('cart.update');
        Route::post('cart/remove', 'CartController@removeCart')->name('cart.remove');
        Route::post('cart/clear', 'CartController@clearCart')->name('cart.clear');
        Route::post('cart/send-order', 'CartController@makeOrder')->name('cart.order');

    });    

});

