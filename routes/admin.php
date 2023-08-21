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

Route::group(['prefix'=>'admin'],function(){
    Auth::routes(["register"=>'false']);
});
Route::group(['prefix' => LaravelLocalization::setLocale().'/admin/',
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','AutoCheckPermission']
],function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard'); 
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('roles', 'RoleController');
    Route::resource('Categories','CategoryController');
    Route::resource('orders','OrderController');
    Route::get('orders/accept/{id}','OrderController@acceptOrders')->name('orders.accept');
    Route::get('orders/reject/{id}','OrderController@rejectOrders')->name('orders.reject');
});
