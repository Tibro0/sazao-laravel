<?php

use App\Http\Controllers\Vendor\VendorController;
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
