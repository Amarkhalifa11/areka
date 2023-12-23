<?php

use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Post;
use App\Models\Product;


use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
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

Route::get('/checkout', function () {
    return view('frontend.checkout');
})->name('checkout');

Route::get('/payment', function () {
    return view('frontend.payment');
})->name('payment');

Route::get('/thank_you', function () {
    return view('frontend.thank_you');
})->name('thank_you');

// Route::get('/edit_quantity', function () {
//     return redirect()->route('home');
// });
// ______________________________________________________________________________________________________

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.home');
        })->name('dashboard');
        
        Route::get('/dashboard/users/all_user', [BackendController::class, 'all_users'])->name('dashboard.users.all_users');
        Route::get('/dashboard/users/delete/{id}', [BackendController::class, 'delete'])->name('dashboard.users.delete');

        
        //category
        
        Route::get('/dashboard/category/all_categoty', [CategoryController::class, 'all_categoty'])->name('dashboard.category.all_categoty');
        Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
        Route::post('/dashboard/category/store', [CategoryController::class, 'store'])->name('dashboard.category.store');
        Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
        Route::post('/dashboard/category/update/{id}', [CategoryController::class, 'update'])->name('dashboard.category.update');
        Route::get('/dashboard/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('dashboard.category.destroy');


        //contact

        Route::get('/dashboard/contacts/all_contact', [ContactController::class, 'all_contact'])->name('dashboard.contacts.all_contact');
        Route::get('/dashboard/contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('dashboard.contacts.destroy');


        //payment
        Route::get('/dashboard/payment/all_payment', [PaymentController::class, 'all_payment'])->name('dashboard.payment.all_payment');
        Route::get('/dashboard/payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('dashboard.payment.destroy');



    });
    
    Route::get('/logout', [BackendController::class, 'logout'])->name('logout');


// ______________________________________________________________________________________________________

// #frontend

Route::get('/posts/single_post/{id}', [PostController::class, 'single_post'])->name('single_post');
 
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
 
Route::get('/products/single_product/{id}', [ProductController::class, 'single_product'])->name('single_product');

Route::post('/cart/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/cart/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::post('/edit_quantity', [CartController::class, 'edit_quantity'])->name('edit_quantity');
Route::post('/cart/place_order', [CartController::class, 'place_order'])->name('place_order');

Route::get('/verify/{transaction_id}', [PaymentController::class, 'verify'])->name('verify');
Route::get('/complete', [PaymentController::class, 'complete'])->name('complete');


