<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
use App\Http\Controllers\Controller;

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

Route::get('/',[Controllers\HomeController::class,'index'])->name('home');
Route::get('/products',[Controllers\ProductController::class,'list'])->name('product.list');
Route::get('/product/{slug}',[Controllers\ProductController::class,'show'])->name('product.detail');
Route::get('/cart', [Controllers\CartController::class,'index'])->name('cart.index');
Route::post('/cart/add', [Controllers\CartController::class,'addToCart'])->name('cart.add');

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/login',[Admin\AuthController::class,'loginForm'])->name('login_form');
    Route::post('/login',[Admin\AuthController::class,'login'])->name('login');
        Route::group(['middleware'=>['admin']],function(){
            Route::resource('/product',Admin\ProductController::class)->names('product');
            Route::resource('/topping',Admin\ToppingController::class)->names('topping');
            Route::post('/logout',[Admin\AuthController::class,'logout'])->name('logout');
        });
 });