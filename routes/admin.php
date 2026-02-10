<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\OrderController;


Route::get('/admin/dashboard/index' , [DashboardController::class , 'index'])->name("admin.dashboard.index");

Route::get('/admin/users/index', [UserController::class , 'index'])->name("admin.users.index");

Route::get('/admin/products/index', [ProductController::class , 'index'])->name("admin.products.index");

Route::get('/admin/categories/index', [CategoryController::class , 'index'])->name("admin.categories.index");
Route::get('/admin/categories/create', [CategoryController::class , 'create'])->name("admin.categories.create");
Route::post('/admin/categories/store' , [CategoryController::class , 'store'])->name("admin.categories.store");
Route::get('/admin/categories/{category}/edit' , [CategoryController::class , 'edit'])->name("admin.categories.edit");
Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}/destroy' , [CategoryController::class , 'destroy'])->name("admin.categories.destroy");

Route::resource('admin/users', UserController::class)->names([
    'index' => 'admin.users.index',
    'edit' => 'admin.users.edit',
    // 'destroy' => 'admin.users.destroy',
    'update' => 'admin.users.update',
    'store' => 'admin.users.store',
    'create' => 'admin.users.create',
]);

Route::patch('users/{user}/toggle', [UserController::class, 'toggleStatus'])->name('admin.users.toggle');
Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/comments/index' , [ReviewController::class , 'index'])->name("admin.comments.index");

Route::get('/admin/comments/product/{id}' , [ReviewController::class , 'show'])->name("admin.comments.product");

Route::get('/admin/permissions/index', [PermissionController::class , 'index'])->name("admin.permissions.index");



Route::get('/admin/products/index' , [ProductController::class , 'index'])->name("admin.products.index");
Route::get('/admin/products/create' , [ProductController::class , 'create'])->name("admin.products.create");
Route::post('/admin/products/store' , [ProductController::class , 'store'])->name("admin.products.store");
Route::get('/admin/products/edit/{product}' , [ProductController::class , 'edit'])->name("admin.products.edit");
Route::put('/admin/products/update/{product}', [ProductController::class, 'update'])->name("admin.products.update");
Route::delete('/admin/products/destroy/{product}', [ProductController::class, 'destroy'])->name("admin.products.destroy");

Route::get('/admin/products/reviews' , [ProductController::class , 'reviews'])->name("admin.products.reviews");

Route::get('/admin/orders/index', [OrderController::class, 'index'])->name('admin.orders.index');
Route::patch('/admin/orders/{item}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');