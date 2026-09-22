<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Livewire\AdminProduct;
use App\Http\Livewire\AddProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// user routes
Route::middleware(['auth','userMiddleware'])->group(function(){

    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
});

// admin routes
Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});


Route::get('/services', function () {
    return view('services');
})->name('services');


Route::get('/products', function () {
    return view('products');
})->name('products');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/admin/add-product', function () {
        return view('admin.add-product');
    })->name('admin.add-product');
});





Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');


// Route to update cart quantity
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Route to remove product from cart
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
// Route to apply promo code
Route::post('/cart/promocode', [CartController::class, 'applyPromoCode']);

// place order
Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');

// admin dashboard route
Route::middleware(['auth'])->get('/admin/dashboard', [OrderController::class, 'showDashboard'])->name('admin.dashboard');

// Order Details Route
Route::middleware(['auth',])->get('/orders/{order}', [OrderController::class, 'showOrder'])->name('orders.show');

// updating the order status
Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');

Route::get('/admin/dashboard', [OrderController::class, 'index'])->name('admin.dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


// cart route using sanctum authentication
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])
    ->middleware('auth:sanctum')
    ->name('cart.add');