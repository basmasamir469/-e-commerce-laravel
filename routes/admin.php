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
    Auth::routes();
});
Route::group(['prefix' => LaravelLocalization::setLocale().'/admin/',
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','AdminAccess']
],function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard'); 
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('Categories','CategoryController');
});
