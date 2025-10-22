<?php

use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProfileController;
use Illuminate\Support\Facades\Route;

// Vendor Route
Route::controller(VendorController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});

Route::controller(VendorProfileController::class)->group(function () {
    Route::get('profile',  'index')->name('profile');
    Route::put('profile', 'updateProfile')->name('profile.update');
    Route::post('profile', 'updatePassword')->name('profile.update.password');
});
