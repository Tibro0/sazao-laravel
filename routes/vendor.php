<?php

use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

// Vendor Route
Route::controller(VendorController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});
