<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//////////////////////////////////
Route::get('tibro', function () {
    // return session()->flush();
    return session()->all();
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

/** Product Route */
Route::controller(FrontendProductController::class)->group(function () {
    Route::get('products', 'productsIndex')->name('products.index');
    Route::get('product-detail/{slug}', 'showProduct')->name('product-detail');
    Route::get('change-product-list-view', 'changeListView')->name('change-product-list-view');
    Route::get('frontend-product-details-tab-list-style', 'frontendProductDetailsTabListStyle')->name('frontend-product-details-tab-list-style');
});

/** Cart Route */
Route::controller(CartController::class)->group(function () {
    Route::post('add-to-cart', 'addToCart')->name('add-to-cart');
    Route::get('cart-details', 'cartDetails')->name('cart-details');
    Route::post('cart/update-quantity', 'updateProductQty')->name('cart.update-quantity');
    Route::get('clear-cart', 'clearCart')->name('clear.cart');
    Route::get('cart/remove-product/{rowId}', 'removeProduct')->name('cart.remove-product');
    Route::get('cart-count', 'gatCartCount')->name('cart-count');
    Route::get('cart-products', 'gatCartProducts')->name('cart-products');
    Route::post('cart/remove-sidebar-product', 'removeSidebarProduct')->name('cart.remove-sidebar-product');
    Route::get('cart/sidebar-product-total', 'CartTotal')->name('cart.sidebar-product-total');
    Route::get('apply-coupon', 'applyCoupon')->name('apply-coupon');
    Route::get('coupon-calculation', 'couponCalculation')->name('coupon-calculation');
});

/** Newsletter Route */
Route::controller(NewsletterController::class)->group(function () {
    Route::post('newsletter-request', 'newsLetterRequest')->name('newsletter-request');
    Route::get('newsletter-verify/{token}',  'newsLetterEmailVerify')->name('newsletter-verify');
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

    /** Orders Route */
    Route::controller(UserOrderController::class)->group(function () {
        Route::get('orders', 'index')->name('orders.index');
        Route::get('orders/show/{id}', 'show')->name('orders.show');
    });

    /** Wishlist Route */
    Route::controller(WishlistController::class)->group(function () {
        Route::get('wishlist', 'index')->name('wishlist.index');
        Route::get('wishlist/add-product', 'addToWishlist')->name('wishlist.store');
        Route::get('wishlist/remove-product/{id}', 'destroy')->name('wishlist.destroy');
    });

    /** Product Review Route */
    Route::controller(ReviewController::class)->group(function () {
        Route::post('review', 'create')->name('review.create');
    });

    /** Checkout Route */
    Route::controller(CheckOutController::class)->group(function () {
        Route::get('checkout', 'index')->name('checkout');
        Route::post('checkout/address-create', 'createAddress')->name('checkout.address.create');
        Route::post('checkout/form-submit', 'checkOutFormSubmit')->name('checkout.form-submit');
    });

    /** Payment Routes */
    Route::controller(PaymentController::class)->group(function () {
        Route::get('payment', 'index')->name('payment');
        Route::get('payment-success', 'paymentSuccess')->name('payment.success');
        /** PayPal Payment */
        Route::get('paypal/payment', 'payWithPaypal')->name('paypal.payment');
        Route::get('paypal/success', 'paypalSuccess')->name('paypal.success');
        Route::get('paypal/cancel', 'paypalCancel')->name('paypal.cancel');
        /** Stripe Route */
        Route::post('stripe/payment', 'payWithStripe')->name('stripe.payment');
        /** Razorpay Route */
        Route::post('razorpay/payment', 'payWithRazorpay')->name('razorpay.payment');
    });
});
