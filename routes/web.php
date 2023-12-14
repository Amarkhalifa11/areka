<?php

use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Post;
use App\Models\Product;

// ______________________________________________________________________________________________________
// ______________________________________________________________________________________________________


Route::get('/', function () {
    $testimonials = Testimonial::all();
    $services     = Service::all()->random(4);
    $posts        = Post::all()->random(3);
    $products     = Product::all()->random(3);

    return view('frontend.home' , compact('testimonials' , 'services' , 'posts' , 'products'));
})->name('home');
// ______________________________________________________________________________________________________

Route::get('/all_product', function () {
    $products     = Product::all();
    return view('frontend.product' , compact('products'));
})->name('all_product');
// ______________________________________________________________________________________________________

Route::get('/about_us', function () {
    $teams        = Team::all();
    $testimonials = Testimonial::all();
    $services     = Service::all()->random(4);

    return view('frontend.about_us' , compact('teams' , 'testimonials' , 'services'));
})->name('about_us');
// ______________________________________________________________________________________________________
Route::get('/services', function () {
    $services = Service::all();
    return view('frontend.service' , compact('services'));
})->name('services');
// ______________________________________________________________________________________________________

Route::get('/blog', function () {
    $posts = Post::all();
    return view('frontend.blogs' , compact('posts'));
})->name('blog');
// ______________________________________________________________________________________________________

Route::get('/contact', function () {
    return view('frontend.contact_us');
})->name('contact');
// ______________________________________________________________________________________________________

Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');
// ______________________________________________________________________________________________________

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ______________________________________________________________________________________________________

// #frontend

use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
 


Route::get('/posts/single_post/{id}', [PostController::class, 'single_post'])->name('single_post');
 
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
 
Route::get('/products/single_product/{id}', [ProductController::class, 'single_product'])->name('single_product');