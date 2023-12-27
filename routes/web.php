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
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderItemsController;
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

// ______________________________________________________________________________________________________

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.home');
        })->name('dashboard');
        
        //user

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


        //service
        Route::get('/dashboard/service/all_service', [ServiceController::class, 'all_service'])->name('dashboard.service.all_service');
        Route::get('/dashboard/service/create', [ServiceController::class, 'create'])->name('dashboard.service.create');
        Route::post('/dashboard/service/store', [ServiceController::class, 'store'])->name('dashboard.service.store');
        Route::get('/dashboard/service/edit/{id}', [ServiceController::class, 'edit'])->name('dashboard.service.edit');
        Route::post('/dashboard/service/update/{id}', [ServiceController::class, 'update'])->name('dashboard.service.update');
        Route::get('/dashboard/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('dashboard.service.destroy');
        
        
        //team
        Route::get('/dashboard/team/all_team', [TeamController::class, 'all_teams'])->name('dashboard.team.all_team');
        Route::get('/dashboard/team/create', [TeamController::class, 'create'])->name('dashboard.team.create');
        Route::get('/dashboard/team/edit/{id}', [TeamController::class, 'edit'])->name('dashboard.team.edit');
        Route::post('/dashboard/team/update/{id}', [TeamController::class, 'update'])->name('dashboard.team.update');
        Route::post('/dashboard/team/store', [TeamController::class, 'store'])->name('dashboard.team.store');
        Route::get('/dashboard/team/destroy/{id}', [TeamController::class, 'destroy'])->name('dashboard.team.destroy');


        //payment
        Route::get('/dashboard/testimonials/all_testimonials', [TestimonialController::class, 'all_testimonials'])->name('dashboard.testimonials.all_testimonials');
        Route::get('/dashboard/testimonials/destroy/{id}', [TestimonialController::class, 'destroy'])->name('dashboard.testimonials.destroy');
        


        //orders
        Route::get('/dashboard/orders/all_orders', [OrdersController::class, 'all_orders'])->name('dashboard.orders.all_orders');
        Route::get('/dashboard/orders/destroy/{id}', [OrdersController::class, 'destroy'])->name('dashboard.orders.destroy');


        //orders item
        Route::get('/dashboard/orders_items/all_orders_items', [OrderItemsController::class, 'all_orders_items'])->name('dashboard.orders_items.all_orders_items');
        Route::get('/dashboard/orders_items/destroy/{id}', [OrderItemsController::class, 'destroy'])->name('dashboard.orders_items.destroy');
        
        
        //posts
        Route::get('/dashboard/posts/all_post', [PostController::class, 'all_post'])->name('dashboard.posts.all_post');
        Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');
        Route::post('/dashboard/posts/store', [PostController::class, 'store'])->name('dashboard.posts.store');
        Route::get('/dashboard/posts/edit/{id}', [PostController::class, 'edit'])->name('dashboard.posts.edit');
        Route::post('/dashboard/posts/update/{id}', [PostController::class, 'update'])->name('dashboard.posts.update');
        Route::get('/dashboard/posts/destroy/{id}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');
                


        //products
        Route::get('/dashboard/product/all_product', [ProductController::class, 'all_product'])->name('dashboard.product.all_product');
        Route::get('/dashboard/product/create', [ProductController::class, 'create'])->name('dashboard.product.create');
        Route::post('/dashboard/product/store', [ProductController::class, 'store'])->name('dashboard.product.storee');
        Route::get('/dashboard/product/edit/{id}', [ProductController::class, 'edit'])->name('dashboard.product.edit');
        Route::post('/dashboard/product/update/{id}', [ProductController::class, 'update'])->name('dashboard.product.update');
        Route::get('/dashboard/product/destroy/{id}', [ProductController::class, 'destroy'])->name('dashboard.product.destroy');
                        

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


