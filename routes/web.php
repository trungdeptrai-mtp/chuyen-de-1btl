<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| HOME + SEARCH
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.detail');

Route::get('/search', [ProductController::class, 'search'])
    ->name('product.search');

Route::get('/search-ajax', [ProductController::class, 'searchAjax'])
    ->name('search.ajax');

Route::get('/category/{type}', [ProductController::class, 'category']);

Route::get('/brand/{brand}', [ProductController::class, 'brand']);

/*
|--------------------------------------------------------------------------
| AUTH REQUIRED
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | GIỎ HÀNG
    |--------------------------------------------------------------------------
    */

    Route::get('/cart', [ProductController::class, 'cart'])
        ->name('cart');

    Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart']);

    Route::get('/buy-now/{id}', [ProductController::class, 'buyNow']);

    Route::get('/increase/{id}', [ProductController::class, 'increase']);

    Route::get('/decrease/{id}', [ProductController::class, 'decrease']);

    Route::get('/remove/{id}', [ProductController::class, 'remove']);

    Route::get('/clear-cart', [ProductController::class, 'clear'])
        ->name('cart.clear');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::post('/place-order', [ProductController::class, 'placeOrder'])
        ->name('place.order');

    Route::get('/order-success', [ProductController::class, 'orderSuccess'])
        ->name('order.success');

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */

    Route::get('/orders', [ProductController::class, 'orders'])
        ->name('orders');

    Route::post('/cancel-order/{id}', [ProductController::class, 'cancelOrder'])
        ->name('order.cancel');

    Route::post('/order/update-status/{id}', [ProductController::class, 'updateStatus'])
        ->name('order.update');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->group(function () {

        Route::get('/', [ProductController::class, 'admin'])
            ->name('admin.index');

        Route::get('/products', [ProductController::class, 'adminProducts'])
            ->name('admin.products');

        Route::get('/orders', [ProductController::class, 'adminOrders'])
            ->name('admin.orders');

        Route::get('/add-product', [ProductController::class, 'createProduct'])
            ->name('admin.add-product');

        Route::post('/add-product', [ProductController::class, 'store'])
            ->name('admin.store-product');

        Route::get('/delete/{id}', [ProductController::class, 'delete'])
            ->name('admin.delete-product');

        Route::get('/delete-order/{id}', [ProductController::class, 'deleteOrder'])
            ->name('admin.delete-order');

        Route::post('/update-order/{id}', [ProductController::class, 'updateStatus'])
            ->name('admin.update-order');

        Route::post('/cancel-order/{id}', [ProductController::class, 'cancelOrder'])
            ->name('admin.cancel-order');
    });

});