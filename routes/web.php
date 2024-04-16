<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::resource('home', ProductController::class);
Route::get('/cart/total', [CartController::class, 'total'])->name('cart.total');

Route::middleware('auth')->group(function () {
    Route::resource('cart', CartController::class);
});

Route::middleware('admin')->group(function () {
    Route::resource('admin', AdminController::class);
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('superadmin')->group(function () {
    Route::resource('superadmin', SuperAdminController::class);
    Route::get('superdashboard', [SuperAdminController::class, 'superdashboard'])->name('superadmin.superdashboard');
   Route::resource('category' ,CategoryController::class);
});
