<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\UMSController::class, 'index'])->name('ums');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/photos', PhotoController::class);
    Route::resource('/brands', BrandController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', UserController::class);
});

Route::resource("/shop", ShopController::class);
Route::resource("/carts", CartController::class);
Route::resource("/orders", OrderController::class);
Route::resource("/reviews", ReviewController::class);
