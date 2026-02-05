<?php

use App\Http\Controllers\Seller\ProductController;
use Illuminate\Support\Facades\Route;





Route::get('/seller/products/index' , [ProductController::class , 'index'])->name("seller.products.index");
Route::get('/seller/products/create' , [ProductController::class , 'create'])->name("seller.products.create");
Route::post('/seller/products/store' , [ProductController::class , 'store'])->name("seller.products.store");
Route::post('/seller/products/edit' , [ProductController::class , 'edit'])->name("seller.products.edit");
Route::get('/seller/products/update' , [ProductController::class , 'update'])->name("seller.products.update");
Route::get('/seller/products/destroy' , [ProductController::class , 'destroy'])->name("seller.products.destroy");