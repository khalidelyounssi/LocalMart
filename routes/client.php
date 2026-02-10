<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::post('/products/{product}/like', [ProductController::class, 'toggleLike'])
    ->middleware('auth')
    ->name('products.like');
Route::get('/dashboard/category/{category}', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.category');


Route::post('/cart/add/{product}', [CartController::class, 'addItem'])
    ->middleware('auth')->name('cart.add');

Route::delete('/cart/item/{product}', [CartController::class, 'deleteItem'])
    ->middleware('auth')
    ->name('cart.delete');

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth')->name('cart.index');