<?php

use App\Http\Controllers\Seller\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\OrderController;





Route::get('/seller/products/index' , [ProductController::class , 'index'])->name("seller.products.index");
Route::get('/seller/products/create' , [ProductController::class , 'create'])->name("seller.products.create");
Route::post('/seller/products/store' , [ProductController::class , 'store'])->name("seller.products.store");
Route::get('/seller/products/edit' , [ProductController::class , 'edit'])->name("seller.products.edit");
Route::post('/seller/products/update' , [ProductController::class , 'update'])->name("seller.products.update");
Route::get('/seller/products/destroy' , [ProductController::class , 'destroy'])->name("seller.products.destroy");
Route::get('/seller/products/reviews' , [ProductController::class , 'reviews'])->name("seller.products.reviews");

Route::get('/seller/orders/index', [OrderController::class, 'index'])->name('seller.orders.index');
Route::patch('/seller/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('seller.orders.updateStatus');
