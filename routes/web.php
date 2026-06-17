<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class,'index']);
    Route::resource('cars', CarController::class);
    Route::resource('brands', AdminBrandController::class);
});