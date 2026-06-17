<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;


// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Cars Routes
Route::get('/cars',          [CarController::class, 'index']);
Route::get('/cars/{type}',   [CarController::class, 'byType']);
Route::post('/cars',         [CarController::class, 'store']);
Route::delete('/cars/{id}',  [CarController::class, 'destroy']);
Route::get('/cars/type/{type}', [CarController::class, 'byType']);

// Contact Routes
Route::post('/contact',  [ContactController::class, 'store']);
Route::get('/contact',   [ContactController::class, 'index']);

//Brands Routes


Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brands', [BrandController::class, 'store']);