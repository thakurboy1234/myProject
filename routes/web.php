<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\blogComtroller;
use App\Http\Controllers\indexController;
use App\Http\Controllers\userController;
use App\Models\blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[indexController::class,'index'])->name('home');

Route::controller(AuthenticationController::class)->group(function(){
    Route::get('/register','register')->name('register');
    Route::post('/store','storeUser')->name('store_user');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login','authenticate')->name('authenticate');
    Route::get('/forgot_password','forgot_password')->name('forgot_password');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(userController::class)->group(function(){
    Route::get('/user_profile','userProfile')->name('user_profile');
    Route::put('/update','updateProfile')->name('update_profile');
});

Route::controller(blogComtroller::class)->group(function(){
    Route::get('/creat_blog','createBlogForm')->name('create_blog');
    Route::post('/create_blog','store')->name('store_blog');
    Route::get('/like','like')->name('like')->middleware('auth');
    Route::get('/comment/{id}','comment')->name('blog_comment')->middleware('auth');
    Route::post('/comment','storeComment')->name('store_comment');
});
