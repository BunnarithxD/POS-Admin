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



    // Users (admin & manager only)
    Route::resource('users', UserDash::class)
        ->middleware('role:admin|manager');

    // Categories (admin, manager, waiter)
    Route::resource('categories', CategoryController::class)
        ->middleware('role:admin|manager|waiter');

    // Products (admin, manager, waiter)
    Route::resource('products', ProductController::class)
        ->middleware('role:admin|manager|waiter');
});
