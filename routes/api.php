<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Backend\BrandController;
use App\Http\Controllers\Api\Backend\CategoryController;
use App\Http\Controllers\Api\Backend\ChildCategoryController;
use App\Http\Controllers\Api\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

Route::group(['middleware' => ['auth:sanctum', 'apiRole:admin'], 'prefix' => 'admin'], function () {
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
