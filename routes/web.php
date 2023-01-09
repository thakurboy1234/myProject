<?php

use App\Http\Controllers\admin\IndexController as AdminIndexController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\blogComtroller;
use App\Http\Controllers\indexController;
use App\Http\Controllers\userController;
use App\Http\Controllers\admin\productController;
use App\Models\blog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('config', function () {
    Artisan::call('cache:clear');
    Artisan::call('storage:link');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return redirect()->back();
});


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
    Route::get('/post','index')->name('post');
    Route::get('/view_post/{blog_id}','show')->name('view_post');
    Route::get('/creat_blog','createBlogForm')->name('create_blog');
    Route::post('/create_blog','store')->name('store_blog');
    Route::get('/like','like')->name('like')->middleware('auth');
    Route::get('/comment/{id}','comment')->name('blog_comment')->middleware('auth');
    Route::post('/comment','storeComment')->name('store_comment');
    Route::get('/delete_post/{id}','distroy')->name('delete.post');
});



// Route::group(['namespace' => 'Admin', 'as' => 'admin::', 'prefix' => 'admin'], function() {
//     // For Other middlewares
//     Route::get('/',[AdminIndexController::class,'index'])->name('home');
// });
Route::prefix('admin')->name('admin.')->group(function () {
    // Route::get('/', function () {
    //   dd(12);
    // });
    Route::get('/',[AdminIndexController::class,'index'])->name('index');

    Route::controller(productController::class)->group(function(){
        Route::get('/products','index')->name('products');
        Route::get('/product_form','createProduct')->name('product.form');
        Route::post('/store_product','storeProduct')->name('product.store');
        Route::get('/edit_product/{id}','edit')->name('product.edit');
        Route::put('/update_product','update')->name('product.update');
        Route::get('/delete_product','delete')->name('product.delete');
        Route::get('/datatable','table')->name('table');
    });

});
