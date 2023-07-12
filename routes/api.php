<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// admin
Route::group(['namespace'=>'Api','prefix'=>'admin'],function(){
    Route::post('login','AuthController@login');
    RoutE::group(['middleware'=>['auth:api','AdminAccess']],function(){
        Route::post('logout','AuthController@logout');
        Route::apiResource('categories','CategoryController');
        Route::apiResource('products','ProductController');
        Route::get('orders','App\Http\Controllers\Api\OrderController@index');
        Route::get('orders/accept/{id}','OrderController@acceptOrders')->name('orders.accept');
        Route::get('orders/reject/{id}','OrderController@rejectOrders')->name('orders.reject');    

  
    });
});

// user
Route::group(['namespace'=>'Api','prefix'=>'user'],function(){

    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::post('send-email','AuthController@sendEmail');
    Route::post('reset-password','AuthController@resetPassword');

    RoutE::group(['middleware'=>['auth:api']],function(){

        Route::post('logout','AuthController@logout');
        Route::get('cart/list','CartController@cartList');
        Route::post('cart/add/{productId}', 'CartController@addToCart');        
        Route::post('update-cart/{productId}', 'CartController@updateCart');
        Route::get('cart/remove/{productId}', 'CartController@removeCart');
        Route::get('cart/clear', 'CartController@clearCart');
        Route::post('cart/send-order', 'CartController@makeOrder');
  
    });
});
