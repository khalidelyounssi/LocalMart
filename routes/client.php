<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\ProductController;

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
