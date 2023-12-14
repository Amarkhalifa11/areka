<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 

//teams
Route::get('/teams/all_teams_api', [TeamController::class, 'all_teams_api']);

//opinian
Route::get('/opinian/all_opinian_api', [TestimonialController::class, 'all_opinian_api']);

//service
Route::get('/services/all_service_api', [ServiceController::class, 'all_service_api']);

//post
Route::get('/posts/all_posts_api', [PostController::class, 'all_posts_api']);
Route::get('/posts/single_post_api/{id}', [PostController::class, 'single_post_api']);

//contact
Route::post('/contact/store_contact_api', [ContactController::class, 'store_contact_api']);

//products
Route::get('/product/all_product_api', [ProductController::class, 'all_product_api']);
Route::get('/product/single_product_api/{id}', [ProductController::class, 'single_product_api']);