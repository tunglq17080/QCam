<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/checkout', function () {
    return view('page.checkout');
});
Route::get('/cart', function () {
    return view('page.shopping-cart');
});
Route::get('/product-detail/{id}', [ProductController::class, 'show']);

// Cart
Route::get('/cart', [CartController::class, 'listCart']);
Route::post('/cart/add/{id}', [CartController::class, 'addItemCart']);
Route::post('/cart/update/{id}', [CartController::class, 'updateItemCart']);
Route::get('/cart/delete/{id}', [CartController::class, 'deleteItemCart']);
Route::post('/cart/add/{id}/qty', [CartController::class, 'addItemCartQty']);