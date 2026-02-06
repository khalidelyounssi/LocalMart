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


