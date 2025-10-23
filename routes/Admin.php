<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

// Admin Route
Route::controller(AdminController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});

// Profile Route
Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::post('profile/update', 'updateProfile')->name('profile.update');
    Route::post('profile/update/password', 'updatePassword')->name('password.update');
});

/** Slider Route */
Route::controller(SliderController::class)->group(function () {
    Route::get('slider', 'index')->name('slider.index');
    Route::get('slider/create', 'create')->name('slider.create');
    Route::post('slider/store', 'store')->name('slider.store');
    Route::get('slider/edit/{id}', 'edit')->name('slider.edit');
    Route::put('slider/{id}', 'update')->name('slider.update');
    Route::delete('slider/{id}', 'destroy')->name('slider.destroy');
});

/** Category Route */
Route::controller(CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category.index');
    Route::get('category/create', 'create')->name('category.create');
    Route::post('category/store', 'store')->name('category.store');
    Route::get('category/edit/{id}', 'edit')->name('category.edit');
    Route::put('category/{id}', 'update')->name('category.update');
    Route::delete('category/{id}', 'destroy')->name('category.destroy');
    Route::put('change-status', 'changeStatus')->name('category.change-status');
});
