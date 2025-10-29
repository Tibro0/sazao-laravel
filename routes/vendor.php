<?php

use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorProductImageGalleryController;
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
