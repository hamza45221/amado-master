<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/product-detail', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/category/{id}', [HomeController::class, 'category'])->name('shop.category');


Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => 'category'], function () {

        Route::get('/', [CategoryController::class, 'view'])->name('category.view');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');


    });

        Route::group(['prefix' => 'product'], function () {

        Route::get('/', [ProductController::class, 'view'])->name('product.view');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');

        

    });




});
