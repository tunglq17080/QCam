<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
// Admin page
use App\Http\Controllers\Admin\DashboardController;

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
// login and logout
Route::get('/login', function () {
    return view('page.login');
});
Route::get('/register', function () {
    return view('page.register');
});
Route::get('/about', function () {
    return view('page.about');
});
Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/profile', [UserController::class, 'userProfile']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'signup']);
Route::get('/logout', [UserController::class, 'logout']);

// search
Route::get('/search', [ProductController::class, 'searchProducts']);
// Category
Route::get('/category/{id}', [CategoryController::class, 'get']);
// Shop
Route::get('/shop', [ProductController::class, 'getAll']);
// Product
Route::get('/product-detail/{id}', [ProductController::class, 'show']);

// Cart
Route::get('/cart', [CartController::class, 'listCart']);
Route::post('/cart/add/{id}', [CartController::class, 'addItemCart']);
Route::post('/cart/update/{id}', [CartController::class, 'updateItemCart']);
Route::get('/cart/delete/{id}', [CartController::class, 'deleteItemCart']);
Route::post('/cart/add/{id}/qty', [CartController::class, 'addItemCartQty']);
// Checkout
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::get('/insert', [OrderController::class, 'insertOrder']);
Route::post('/confirmCheckout', [OrderController::class, 'confirmCheckout']);
// Admin page
Route::group(['prefix' => 'admin','middleware'=>'isAdmin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/getOrders', [DashboardController::class, 'getOrders']);
});