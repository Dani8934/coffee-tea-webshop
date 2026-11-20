<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show'])->whereNumber('category');
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{category}', [CategoryController::class, 'update'])->whereNumber('category');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->whereNumber('category');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show'])->whereNumber('product');
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}', [ProductController::class, 'update'])->whereNumber('product');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->whereNumber('product');

Route::post('/products/{product}/packages', [ProductPackageController::class, 'store'])->whereNumber('product');
Route::put('/packages/{package}', [ProductPackageController::class, 'update'])->whereNumber('package');
Route::delete('/packages/{package}', [ProductPackageController::class, 'destroy'])->whereNumber('package');
