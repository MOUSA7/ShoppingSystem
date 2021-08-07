<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//$ca = Category::get();
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function (){
    Route::get('/',[\App\Http\Controllers\HomeController::class,'dashboard'])->name('dashboard');
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('subcategories',\App\Http\Controllers\SubCategoryController::class);
    Route::resource('products',\App\Http\Controllers\ProductController::class);
    Route::get('subcategories/{id}/all',[\App\Http\Controllers\ProductController::class,'loadSubCategory'])->name('subcategories.all');

    Route::resource('users',\App\Http\Controllers\UserController::class,['names'=>[
        Route::get('admin/users/{id}/delete',[\App\Http\Controllers\UserController::class,'destroy'])->name('users.delete')
    ]]);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout']);


Route::prefix('/')->name('home.')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
    Route::get('/show/{id}',[\App\Http\Controllers\FrontendController::class,'show'])->name('show');
    Route::get('/category/{name}',[\App\Http\Controllers\FrontendController::class,'ProductCategory'])->name('category');
    Route::get('contact',[\App\Http\Controllers\FrontendController::class,'contact'])->name('contact');

    Route::get('/add/Cart/{name}',[\App\Http\Controllers\CartController::class,'addCart'])->name('add.cart');
    Route::get('cart',[\App\Http\Controllers\CartController::class,'showCart'])->name('show.cart');
    Route::post('products/{product}',[\App\Http\Controllers\CartController::class,'UpdateCart'])->name('update.cart');
    Route::post('remove/product/{product}',[\App\Http\Controllers\CartController::class,'RemoveCart'])->name('remove.cart');


    Route::get('checkout/{amount}',[\App\Http\Controllers\CartController::class,'checkout'])->name('checkout')->middleware('auth');
    Route::post('checkout',[\App\Http\Controllers\CartController::class,'charge'])->name('charge')->middleware('auth');

});
