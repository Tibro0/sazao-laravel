<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//////////////////////////////////
Route::get('tibro', function () {
    return Cart::content();
});
////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'guest'], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/login', 'login')->name('admin.login');
    });
});

Route::controller(FlashSaleController::class)->group(function () {
    Route::get('flash-sale', 'index')->name('flash-sale');
});

/** Product Detail Route */
Route::controller(FrontendProductController::class)->group(function () {
    Route::get('product-detail/{slug}', 'showProduct')->name('product-detail');
});

/** Cart Route */
Route::controller(CartController::class)->group(function () {
    Route::post('add-to-cart', 'addToCart')->name('add-to-cart');
    Route::get('cart-details', 'cartDetails')->name('cart-details');
    Route::post('cart/update-quantity', 'updateProductQty')->name('cart.update-quantity');
    Route::get('clear-cart', 'clearCart')->name('clear.cart');
    Route::get('cart/remove-product/{rowId}', 'removeProduct')->name('cart.remove-product');
    Route::get('cart-count', 'gatCartCount')->name('cart-count');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::controller(UserDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    /** User Profile Route */
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::put('profile', 'updateProfile')->name('profile.update');
        Route::post('profile', 'updatePassword')->name('profile.update.password');
    });

    /** User Address Route */
    Route::controller(UserAddressController::class)->group(function () {
        Route::get('address', 'index')->name('address.index');
        Route::get('address/create', 'create')->name('address.create');
        Route::post('address/store', 'store')->name('address.store');
        Route::get('address/edit/{id}', 'edit')->name('address.edit');
        Route::put('address/{id}', 'update')->name('address.update');
        Route::delete('address/{id}', 'destroy')->name('address.destroy');
    });
});
