<?php

use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorOrderController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorProductImageGalleryController;
use App\Http\Controllers\Vendor\VendorProductReviewController;
use App\Http\Controllers\Vendor\VendorProductVariantController;
use App\Http\Controllers\Vendor\VendorProductVariantItemController;
use App\Http\Controllers\Vendor\VendorProfileController;
use App\Http\Controllers\Vendor\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

// Vendor Dashboard Route
Route::controller(VendorController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});

// Vendor Profile Route
Route::controller(VendorProfileController::class)->group(function () {
    Route::get('profile',  'index')->name('profile');
    Route::put('profile', 'updateProfile')->name('profile.update');
    Route::post('profile', 'updatePassword')->name('profile.update.password');
});

/** Vendor Shop Profile Route */
Route::controller(VendorShopProfileController::class)->group(function () {
    Route::get('shop-profile', 'index')->name('shop-profile.index');
    Route::post('shop-profile/store', 'store')->name('shop-profile.store');
});

/** Vendor Products Route */
Route::controller(VendorProductController::class)->group(function () {
    Route::get('products', 'index')->name('products.index');
    Route::get('products/create', 'create')->name('products.create');
    Route::post('products/store', 'store')->name('products.store');
    Route::get('products/edit/{id}', 'edit')->name('products.edit');
    Route::put('products/{id}', 'update')->name('products.update');
    Route::delete('products/{id}', 'destroy')->name('products.destroy');
    Route::get('product/get-subcategories', 'getSubCategories')->name('product.get-subcategories');
    Route::get('product/get-child-categories', 'getChildCategories')->name('product.get-child-categories');
    Route::put('products-change-status', 'changeStatus')->name('products.change-status');
});

/** Vendor Products Image Gallery Route */
Route::controller(VendorProductImageGalleryController::class)->group(function () {
    Route::get('products-image-gallery', 'index')->name('products-image-gallery.index');
    Route::post('products-image-gallery/store', 'store')->name('products-image-gallery.store');
    Route::delete('products-image-gallery/{id}', 'destroy')->name('products-image-gallery.destroy');
});

/** Vendor Product Variant Route */
Route::controller(VendorProductVariantController::class)->group(function () {
    Route::get('products-variant', 'index')->name('products-variant.index');
    Route::get('products-variant/create', 'create')->name('products-variant.create');
    Route::post('products-variant/store', 'store')->name('products-variant.store');
    Route::get('products-variant/edit/{id}', 'edit')->name('products-variant.edit');
    Route::put('products-variant/{id}', 'update')->name('products-variant.update');
    Route::delete('products-variant/{id}', 'destroy')->name('products-variant.destroy');
    Route::put('products-variant-change-status', 'changeStatus')->name('products-variant.change-status');
});

/** Vendor Product Variant Item Route */
Route::controller(VendorProductVariantItemController::class)->group(function () {
    Route::get('products-variant-item/{productId}/{variantId}', 'index')->name('products-variant-item.index');
    Route::get('products-variant-item/create/{productId}/{variantId}', 'create')->name('products-variant-item.create');
    Route::post('products-variant-item', 'store')->name('products-variant-item.store');
    Route::get('products-variant-item-edit/{variantItemId}', 'edit')->name('products-variant-item.edit');
    Route::put('products-variant-item-update/{variantItemId}', 'update')->name('products-variant-item.update');
    Route::delete('products-variant-item/{variantItemId}', 'destroy')->name('products-variant-item.destroy');
    Route::put('products-variant-item-change-status', 'changeStatus')->name('products-variant-item.change-status');
});

/** Orders Route */
Route::controller(VendorOrderController::class)->group(function () {
    Route::get('orders', 'index')->name('orders.index');
    Route::get('orders/show/{id}', 'show')->name('orders.show');
    Route::get('orders/status/{id}', 'orderStatus')->name('orders.status');
});

/** Reviews Route */
Route::controller(VendorProductReviewController::class)->group(function () {
    Route::get('reviews', 'index')->name('reviews.index');
});
