<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class)->names([
        'index'   => 'seller.index',
        'create'  => 'seller.create',
        'store'   => 'seller.store',
        'edit'    => 'seller.edit',
        'update'  => 'seller.update',
        'destroy' => 'seller.destroy',  
    ]);
});