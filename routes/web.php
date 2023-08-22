<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
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

Route::get('/', function () {
    return view('home');
});



Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/login',[Admin\AuthController::class,'loginForm'])->name('login_form');
    Route::post('/login',[Admin\AuthController::class,'login'])->name('login');
        Route::group(['middleware'=>['admin']],function(){
            Route::resource('/product',Admin\ProductController::class)->names('product');
            Route::resource('/topping',Admin\ToppingController::class)->names('topping');
            Route::post('/logout',[Admin\AuthController::class,'logout'])->name('logout');
        });
 });