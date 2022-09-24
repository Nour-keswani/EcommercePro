<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/redirect',[HomeController::class,'redirect']);
});

// To see the product details from home page
route::get('/product_details/{id}',[HomeController::class,'product_details']);

// To add the product to the cart
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
// To show the product cart / what did you chose
route::get('/show_cart',[HomeController::class,'show_cart']);
// To Delete the product from the shop cart
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
// To pay with cash route
route::get('/cash_order/{totalproduct}',[HomeController::class,'cash_order']);
// To pay with stripe method
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe', [HomeController::class,'stripePost'])->name('stripe.post');


// ***Admin category***
// To See the category in admin page
route::get('/view_category',[AdminController::class,'view_category']);
// To Add category in admin page
route::post('/add_category',[AdminController::class,'add_category']);
// To Delete the category in admin page
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

// ***Admin Products
// On the sidebar Products / Add option is the view_product rout
route::get('/view_product',[AdminController::class,'view_product']);
// To Add the Products in admin page
route::post('/add_product',[AdminController::class,'add_product']);
// On the sidebar Products / Show option is the show_product rout
route::get('/show_product',[AdminController::class,'show_product']);

// To Delete and edit the product from show admin page
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
route::post('/edit_product_confirm/{id}',[AdminController::class,'edit_product_confirm']);

