<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDash;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Protected routes (auth required)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard (all authenticated users)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin-only routes
    Route::middleware(['role:admin'])->group(function () {

        // Users management
        Route::resource('users', UserDash::class);

        // Categories management
        Route::resource('categories', CategoryController::class);

        // Products management
        Route::resource('products', ProductController::class);
    });
});
