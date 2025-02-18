<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class,'create'])->name('register');

Route::post('/validate-registration', [RegisterController::class,'validateUser'])->name('validate-registration');

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/dashboard', [LoginController::class,'validateUser'])->name('dashboard');

Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/get-category', [DashboardController::class,'category'])->name('get-category');

Route::get('/get-product', [DashboardController::class,'product'])->name('get-product');

Route::post('/store', [CategoryController::class,'store'])->name('get-category')->name('store');

// Route::get('/get-product', [DashboardController::class, 'index'])->name('get-product');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');











