<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products');

/*
|--------------------------------------------------------------------------
| Product Details
|--------------------------------------------------------------------------
*/

Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::view('/contact', 'contact')->name('contact');