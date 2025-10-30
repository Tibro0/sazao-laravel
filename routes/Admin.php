<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
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
    Route::put('slider-change-status', 'changeStatus')->name('slider.change-status');
});

/** Category Route */
Route::controller(CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category.index');
    Route::get('category/create', 'create')->name('category.create');
    Route::post('category/store', 'store')->name('category.store');
    Route::get('category/edit/{id}', 'edit')->name('category.edit');
    Route::put('category/{id}', 'update')->name('category.update');
    Route::delete('category/{id}', 'destroy')->name('category.destroy');
    Route::put('category-change-status', 'changeStatus')->name('category.change-status');
});

/** Sub Category Route */
Route::controller(SubCategoryController::class)->group(function () {
    Route::get('sub-category', 'index')->name('sub-category.index');
    Route::get('sub-category/create', 'create')->name('sub-category.create');
    Route::post('sub-category/store', 'store')->name('sub-category.store');
    Route::get('sub-category/edit/{id}', 'edit')->name('sub-category.edit');
    Route::put('sub-category/{id}', 'update')->name('sub-category.update');
    Route::delete('sub-category/{id}', 'destroy')->name('sub-category.destroy');
    Route::put('sub-category-change-status', 'changeStatus')->name('sub-category.change-status');
});

/** Child Category Route */
Route::controller(ChildCategoryController::class)->group(function () {
    Route::get('child-category', 'index')->name('child-category.index');
    Route::get('child-category/create', 'create')->name('child-category.create');
    Route::get('get-subcategories', 'getSubCategory')->name('get-subcategories');
    Route::post('child-category/store', 'store')->name('child-category.store');
    Route::get('child-category/edit/{id}', 'edit')->name('child-category.edit');
    Route::put('child-category/{id}', 'update')->name('child-category.update');
    Route::delete('child-category/{id}', 'destroy')->name('child-category.destroy');
    Route::put('child-category-change-status', 'changeStatus')->name('child-category.change-status');
});

/** Brand Route */
Route::controller(BrandController::class)->group(function () {
    Route::get('brand', 'index')->name('brand.index');
    Route::get('brand/create', 'create')->name('brand.create');
    Route::post('brand/store', 'store')->name('brand.store');
    Route::get('brand/edit/{id}', 'edit')->name('brand.edit');
    Route::put('brand/{id}', 'update')->name('brand.update');
    Route::delete('brand/{id}', 'destroy')->name('brand.destroy');
    Route::put('brand-change-status', 'changeStatus')->name('brand.change-status');
});

/** Vendor Profile Route */
Route::controller(AdminVendorProfileController::class)->group(function () {
    Route::get('vendor-profile', 'index')->name('vendor-profile.index');
    Route::post('vendor-profile/store', 'store')->name('vendor-profile.store');
});


/** Products Route */
Route::controller(ProductController::class)->group(function () {
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

/** Products Image Gallery Route */
Route::controller(ProductImageGalleryController::class)->group(function () {
    Route::get('products-image-gallery', 'index')->name('products-image-gallery.index');
    Route::post('products-image-gallery/store', 'store')->name('products-image-gallery.store');
    Route::delete('products-image-gallery/{id}', 'destroy')->name('products-image-gallery.destroy');
});

/** Product Variant Route */
Route::controller(ProductVariantController::class)->group(function () {
    Route::get('products-variant', 'index')->name('products-variant.index');
    Route::get('products-variant/create', 'create')->name('products-variant.create');
    Route::post('products-variant/store', 'store')->name('products-variant.store');
    Route::get('products-variant/edit/{id}', 'edit')->name('products-variant.edit');
    Route::put('products-variant/{id}', 'update')->name('products-variant.update');
    Route::delete('products-variant/{id}', 'destroy')->name('products-variant.destroy');
    Route::put('products-variant-change-status', 'changeStatus')->name('products-variant.change-status');
});

/** Product Variant Item Route */
Route::controller(ProductVariantItemController::class)->group(function () {
    Route::get('products-variant-item/{productId}/{variantId}', 'index')->name('products-variant-item.index');
    Route::get('products-variant-item/create/{productId}/{variantId}', 'create')->name('products-variant-item.create');
    Route::post('products-variant-item', 'store')->name('products-variant-item.store');
    Route::get('products-variant-item-edit/{variantItemId}', 'edit')->name('products-variant-item.edit');
    Route::put('products-variant-item-update/{variantItemId}', 'update')->name('products-variant-item.update');
    Route::delete('products-variant-item/{variantItemId}', 'destroy')->name('products-variant-item.destroy');
    Route::put('products-variant-item-change-status', 'changeStatus')->name('products-variant-item.change-status');
});

/** Seller Product Routs */
Route::controller(SellerProductController::class)->group(function () {
    Route::get('seller-products', 'index')->name('seller-products.index');
    Route::get('seller-pending-products', 'pendingProducts')->name('seller-pending-products.index');
    Route::put('change-approve-status', 'changeApproveStatus')->name('change-approve-status');
});
