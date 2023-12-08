<?php

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



Route::get('/', function () {
    return view('frontend.home');
})->name('home');


Route::get('/all_product', function () {
    return view('frontend.product');
})->name('all_product');

Route::get('/about_us', function () {
    return view('frontend.about_us');
})->name('about_us');

Route::get('/services', function () {
    return view('frontend.service');
})->name('services');

Route::get('/blog', function () {
    return view('frontend.blogs');
})->name('blog');

Route::get('/contact', function () {
    return view('frontend.contact_us');
})->name('contact');

Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
