<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/menu', function () {
    return view('menu');
})->name('menu');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Size Store Route
    Route::post('/sizes', [SizeController::class, 'store'])->name('sizes.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
