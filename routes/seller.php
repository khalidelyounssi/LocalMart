<?php

use App\Http\Controllers\ProductController;

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
// داخل routes/seller.php
Route::resource('products', ProductController::class)->names([
    'index' => 'seller.products.index',
    'create' => 'seller.products.create',
    // ...
]);