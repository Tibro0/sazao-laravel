<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

Route::group(['middleware' => ['auth:sanctum', 'apiRole:admin'], 'prefix' => 'admin'], function () {
    // Admin Logout Route
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });

    // Admin Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::delete('categories/{id}', 'destroy');
    });
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
