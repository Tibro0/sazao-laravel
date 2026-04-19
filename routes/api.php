<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Backend\AdminController;
use App\Http\Controllers\Api\Backend\AdminVendorProfileController;
use App\Http\Controllers\Api\Backend\BrandController;
use App\Http\Controllers\Api\Backend\CategoryController;
use App\Http\Controllers\Api\Backend\ChildCategoryController;
use App\Http\Controllers\Api\Backend\CouponController;
use App\Http\Controllers\Api\Backend\FlashSaleController;
use App\Http\Controllers\Api\Backend\OrderController;
use App\Http\Controllers\Api\Backend\PaymentSettingController;
use App\Http\Controllers\Api\Backend\PaypalSettingController;
use App\Http\Controllers\Api\Backend\ProfileController;
use App\Http\Controllers\Api\Backend\ShippingRuleController;
use App\Http\Controllers\Api\Backend\SubCategoryController;
use App\Http\Controllers\Api\Backend\TransactionController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

Route::group(['middleware' => ['auth:sanctum', 'apiRole:admin'], 'prefix' => 'admin'], function () {

    // Dashboard Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'dashboard');
    });

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index');
        Route::post('profile/update', 'updateProfile');
        Route::post('profile/update-password', 'updatePassword');
    });

    // Logout Route
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });

    // Categories Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::delete('categories/{id}', 'destroy');
    });

    // Sub Categories Routes
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('sub-categories', 'index');
        Route::post('sub-categories', 'store');
        Route::get('sub-categories/{id}', 'show');
        Route::put('sub-categories/{id}', 'update');
        Route::delete('sub-categories/{id}', 'destroy');
    });

    // Child Categories Routes
    Route::controller(ChildCategoryController::class)->group(function () {
        Route::get('child-categories', 'index');
        Route::post('child-categories', 'store');
        Route::get('child-categories/{id}', 'show');
        Route::put('child-categories/{id}', 'update');
        Route::delete('child-categories/{id}', 'destroy');
        Route::get('get-sub-categories/{categoryId}', 'getSubCategory');
    });

    // Brand Routes
    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index');
        Route::post('brands', 'store');
        Route::get('brands/{id}', 'show');
        Route::post('brands/{id}', 'update');
        Route::delete('brands/{id}', 'destroy');
    });

    // Order Routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/{id}', 'show');
        Route::get('orders-pending', 'pendingOrders');
        Route::get('orders-processed', 'processedOrders');
        Route::get('orders-dropped-off', 'DroppedOffOrders');
        Route::get('orders-shipped', 'shippedOrders');
        Route::get('orders-out-for-delivery', 'outForDeliveryOrders');
        Route::get('orders-delivered', 'deliveredOrders');
        Route::get('orders-canceled', 'canceledOrders');
        Route::delete('orders/{id}', 'destroy');
        Route::post('change-order-status/{id}', 'changeOrderStatus');
        Route::post('change-payment-status/{id}', 'changePaymentStatus');
    });

    // Transaction Routes
    Route::controller(TransactionController::class)->group(function () {
        Route::get('transactions', 'index');
    });

    // Flash Sale Routes
    Route::controller(FlashSaleController::class)->group(function () {
        Route::get('flash-sale', 'index');
        Route::post('flash-sale-date/update', 'update');
        Route::post('flash-sale/add-product', 'addProduct');
    });

    // Coupon Routes
    Route::controller(CouponController::class)->group(function () {
        Route::get('coupons', 'index');
        Route::post('coupons', 'store');
        Route::get('coupons/{id}', 'show');
        Route::put('coupons/{id}', 'update');
        Route::delete('coupons/{id}', 'destroy');
    });

    // Shipping Rule Routes
    Route::controller(ShippingRuleController::class)->group(function () {
        Route::get('shipping-rules', 'index');
        Route::post('shipping-rules', 'store');
        Route::get('shipping-rules/{id}', 'show');
        Route::put('shipping-rules/{id}', 'update');
        Route::delete('shipping-rules/{id}', 'destroy');
    });

    // Vendor Profile Route
    Route::controller(AdminVendorProfileController::class)->group(function () {
        Route::get('vendor-profile', 'index');
        Route::post('vendor-profile', 'store');
    });

    // Payment Setting Route
    Route::controller(PaymentSettingController::class)->group(function () {
        Route::get('payment-setting', 'index');
    });

    // PayPal Setting Routes
    Route::controller(PaypalSettingController::class)->group(function () {
        Route::put('paypal-setting', 'update');
    });

    // Route::controller(StripeSettingController::class)->group(function () {
    //     Route::put('stripe-setting/{id}', 'update');
    // });

    // Route::controller(RazorPaySettingController::class)->group(function () {
    //     Route::put('razorpay-setting/{id}', 'update');
    // });

    // Route::controller(CodSettingController::class)->group(function () {
    //     Route::put('cod-setting/{id}', 'update');
    // });
});

Route::group(['middleware' => ['auth:sanctum', 'apiRole:vendor'], 'prefix' => 'vendor'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });
});

Route::group(['middleware' => ['auth:sanctum', 'apiRole:user'], 'prefix' => 'user'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });
});
