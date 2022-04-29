<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BotManController;
// Admin page
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;

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
Route::get('/momoPayCallBack', [OrderController::class, 'momoPayCallBack']);
// order
Route::get('/order-detail', [OrderController::class, 'orderDetail']);
// Admin page
Route::group(['prefix' => 'cp', 'middleware'=>'isAdmin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/getOrders', [DashboardController::class, 'getOrders'])->name('admin.order');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [AdminCategory::class, 'index'])->name('admin.category');
        Route::get('/list', [AdminCategory::class, 'search'])->name('admin.category.list');
        Route::get('/create', [AdminCategory::class, 'create'])->name('admin.category.create');
        Route::get('/edit/{id}', [AdminCategory::class, 'edit'])->name('admin.category.edit')->where('id', '[0-9]+');

        Route::post('/store', [AdminCategory::class, 'store'])->name('admin.category.store');
        Route::get('/delete/{id}', [AdminCategory::class, 'delete'])->name('admin.category.delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [AdminProduct::class, 'index'])->name('admin.product');
        Route::get('/list', [AdminProduct::class, 'search'])->name('admin.product.list');
        Route::get('/create', [AdminProduct::class, 'create'])->name('admin.product.create');
        Route::get('/edit/{id}', [AdminProduct::class, 'edit'])->name('admin.product.edit')->where('id', '[0-9]+');
        Route::post('/store', [AdminProduct::class, 'store'])->name('admin.product.store');

        Route::get('/delete/{id}', [AdminProduct::class, 'delete'])->name('admin.product.delete')->where('id', '[0-9]+');

    });

});

// chatbot
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
