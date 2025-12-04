<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminProductReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RazorPaySettingController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
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

/** Reviews Route */
Route::controller(AdminProductReviewController::class)->group(function () {
    Route::get('reviews', 'index')->name('review.index');
    Route::put('reviews/change-status', 'changeStatus')->name('reviews.change-status');
});

/** Seller Product Routs */
Route::controller(SellerProductController::class)->group(function () {
    Route::get('seller-products', 'index')->name('seller-products.index');
    Route::get('seller-pending-products', 'pendingProducts')->name('seller-pending-products.index');
    Route::put('change-approve-status', 'changeApproveStatus')->name('change-approve-status');
});

/** Flash Sale Route */
Route::controller(FlashSaleController::class)->group(function () {
    Route::get('flash-sale', 'index')->name('flash-sale.index');
    Route::put('flash-sale', 'update')->name('flash-sale.update');
    Route::post('flash-sale/add-product', 'addProduct')->name('flash-sale.add-product');
    Route::put('flash-sale/show-at-home/status-change', 'changeShowAtHomeStatus')->name('flash-sale.show-at-home.change-status');
    Route::put('flash-sale-status', 'changeStatus')->name('flash-sale-status');
    Route::delete('flash-sale/{id}', 'destroy')->name('flash-sale.destroy');
});

/** Coupons Route */
Route::controller(CouponController::class)->group(function () {
    Route::get('coupons', 'index')->name('coupons.index');
    Route::get('coupons/create', 'create')->name('coupons.create');
    Route::post('coupons/store', 'store')->name('coupons.store');
    Route::get('coupons/edit/{id}', 'edit')->name('coupons.edit');
    Route::put('coupons/{id}', 'update')->name('coupons.update');
    Route::delete('coupons/{id}', 'destroy')->name('coupons.destroy');
    Route::put('coupons-change-status', 'changeStatus')->name('coupons.change-status');
});

/** Shipping Rule Route */
Route::controller(ShippingRuleController::class)->group(function () {
    Route::get('shipping-rule', 'index')->name('shipping-rule.index');
    Route::get('shipping-rule/create', 'create')->name('shipping-rule.create');
    Route::post('shipping-rule/store', 'store')->name('shipping-rule.store');
    Route::get('shipping-rule/edit/{id}', 'edit')->name('shipping-rule.edit');
    Route::put('shipping-rule/{id}', 'update')->name('shipping-rule.update');
    Route::delete('shipping-rule/{id}', 'destroy')->name('shipping-rule.destroy');
    Route::put('shipping-rule-change-status', 'changeStatus')->name('shipping-rule.change-status');
});

/** Order Routs */
Route::controller(OrderController::class)->group(function () {
    Route::get('order', 'index')->name('order.index');
    Route::get('pending-orders', 'pendingOrders')->name('pending-orders');
    Route::get('processed-orders',  'processedOrders')->name('processed-orders');
    Route::get('dropped-off-orders',  'DroppedOffOrders')->name('dropped-off-orders');
    Route::get('shipped-orders', 'shippedOrders')->name('shipped-orders');
    Route::get('out-for-delivery-orders', 'outForDeliveryOrders')->name('out-for-delivery-orders');
    Route::get('delivered-orders', 'deliveredOrders')->name('delivered-orders');
    Route::get('canceled-orders', 'canceledOrders')->name('canceled-orders');
    Route::get('order/{id}', 'show')->name('order.show');
    Route::delete('order/{id}', 'destroy')->name('order.destroy');
    Route::get('payment-status', 'changePaymentStatus')->name('payment.status');
    Route::get('order-status', 'changeOrderStatus')->name('order.status');
});

/**Order Transaction Route */
Route::controller(TransactionController::class)->group(function () {
    Route::get('transaction', 'index')->name('transaction');
});

/** Setting Route */
Route::controller(SettingController::class)->group(function () {
    Route::get('settings', 'index')->name('settings.index');
    Route::get('admin-general-setting-list-style', 'adminGeneralSettingListStyle')->name('admin-general-setting-list-style');
    Route::put('general-setting-update', 'generalSettingUpdate')->name('general-setting-update');
    Route::put('email-setting-update', 'emailConfigSettingUpdate')->name('email-setting-update');
});

/** Home Page Setting Route */
Route::controller(HomePageSettingController::class)->group(function () {
    Route::get('home-page-setting', 'index')->name('home-page-setting');
    Route::put('popular-category-section', 'updatePopularCategorySection')->name('popular-category-section');
    Route::put('product-slider-section-one', 'updateProductSliderSectionOne')->name('product-slider-section-one');
    Route::put('product-slider-section-two', 'updateProductSliderSectionTwo')->name('product-slider-section-two');
    Route::put('product-slider-section-three', 'updateProductSliderSectionThree')->name('product-slider-section-three');
    Route::get('admin-home-page-setting-list-style', 'adminHomePageSettingListStyle')->name('admin-home-page-setting-list-style');
});

/** Subscriber Route */
Route::controller(SubscribersController::class)->group(function () {
    Route::get('subscribers', 'index')->name('subscribers.index');
    Route::post('subscribers-send-mail', 'sendMail')->name('subscribers-send-mail');
    Route::delete('subscribers/{id}', 'destroy')->name('subscribers.destroy');
});

/** Advertisement Route */
Route::controller(AdvertisementController::class)->group(function () {
    Route::get('advertisement', 'index')->name('advertisement.index');
    Route::put('advertisement/homepage-banner-section-one', 'homepageBannerSectionOne')->name('homepage-banner-section-one');
    Route::put('advertisement/homepage-banner-section-two', 'homepageBannerSectionTwo')->name('homepage-banner-section-two');
    Route::put('advertisement/homepage-banner-section-three', 'homepageBannerSectionThree')->name('homepage-banner-section-three');
    Route::put('advertisement/homepage-banner-section-four', 'homepageBannerSectionFour')->name('homepage-banner-section-four');
    Route::put('advertisement/product-page-banner', 'productPageBanner')->name('product-page-banner');
    Route::put('advertisement/cart-page-banner', 'cartPageBanner')->name('cart-page-banner');
    Route::get('admin-advertisement-list-style', 'adminAdvertisementListStyle')->name('admin-advertisement-list-style');
});

/** Vendor Request Route */
Route::controller(VendorRequestController::class)->group(function () {
    Route::get('vendor-request', 'index')->name('vendor-request.index');
    Route::get('vendor-request/show/{id}', 'show')->name('vendor-request.show');
    Route::put('vendor-request/change-status/{id}', 'changeStatus')->name('vendor-request.change-status');
});

/** Customer List Route */
Route::controller(CustomerListController::class)->group(function () {
    Route::get('customer', 'index')->name('customer.index');
    Route::put('customer/status-change', 'StatusChange')->name('customer.status-change');
});

/** admin list Route */
Route::controller(AdminListController::class)->group(function () {
    Route::get('admin-list', 'index')->name('admin-list.index');
    Route::put('admin-list/status-change', 'statusChange')->name('admin-list.status-change');
    Route::delete('admin-list/{id}', 'destroy')->name('admin-list.destroy');
});

/** Vendor List Route */
Route::controller(VendorListController::class)->group(function () {
    Route::get('vendor-list', 'index')->name('vendor-list.index');
    Route::put('vendor-list/status-change', 'StatusChange')->name('vendor-list.status-change');
});

/** Vendor Condition Route */
Route::controller(VendorConditionController::class)->group(function () {
    Route::get('vendor-condition', 'index')->name('vendor-condition.index');
    Route::put('vendor-condition/update', 'update')->name('vendor-condition.update');
});

/** Manage User List */
Route::controller(ManageUserController::class)->group(function () {
    Route::get('manage-user', 'index')->name('manage-user.index');
    Route::post('manage-user', 'create')->name('manage-user.create');
});

/** About Page Route */
Route::controller(AboutController::class)->group(function () {
    Route::get('about', 'index')->name('about.index');
    Route::put('about/update', 'update')->name('about.update');
});

/** Terms and Conditions Page Route */
Route::controller(TermsAndConditionsController::class)->group(function () {
    Route::get('terms-and-condition', 'index')->name('terms-and-condition.index');
    Route::put('terms-and-condition/update', 'update')->name('terms-and-condition.update');
});

/** PrivacyPolicy Page Route */
Route::controller(PrivacyPolicyController::class)->group(function () {
    Route::get('privacy-policy', 'index')->name('privacy-policy.index');
    Route::put('privacy-policy/update', 'update')->name('privacy-policy.update');
});

/** Footer Route */
Route::controller(FooterInfoController::class)->group(function () {
    Route::get('footer-info', 'index')->name('footer-info.index');
    Route::put('footer-info/{id}', 'update')->name('footer-info.update');
});

Route::controller(FooterSocialController::class)->group(function () {
    Route::get('footer-socials', 'index')->name('footer-socials.index');
    Route::get('footer-socials/create', 'create')->name('footer-socials.create');
    Route::post('footer-socials/store', 'store')->name('footer-socials.store');
    Route::get('footer-socials/edit/{id}', 'edit')->name('footer-socials.edit');
    Route::put('footer-socials/{id}', 'update')->name('footer-socials.update');
    Route::delete('footer-socials/{id}', 'destroy')->name('footer-socials.destroy');
    Route::put('footer-socials-change-status', 'changeStatus')->name('footer-socials.change-status');
});

Route::controller(FooterGridTwoController::class)->group(function () {
    Route::get('footer-grid-two', 'index')->name('footer-grid-two.index');
    Route::get('footer-grid-two/create', 'create')->name('footer-grid-two.create');
    Route::post('footer-grid-two/store', 'store')->name('footer-grid-two.store');
    Route::get('footer-grid-two/edit/{id}', 'edit')->name('footer-grid-two.edit');
    Route::put('footer-grid-two/{id}', 'update')->name('footer-grid-two.update');
    Route::delete('footer-grid-two/{id}', 'destroy')->name('footer-grid-two.destroy');
    Route::put('footer-grid-two-change-status', 'changeStatus')->name('footer-grid-two.change-status');
    Route::post('footer-grid-two/change-title', 'changeTitle')->name('footer-grid-two.change-title');
});

Route::controller(FooterGridThreeController::class)->group(function () {
    Route::get('footer-grid-three', 'index')->name('footer-grid-three.index');
    Route::get('footer-grid-three/create', 'create')->name('footer-grid-three.create');
    Route::post('footer-grid-three/store', 'store')->name('footer-grid-three.store');
    Route::get('footer-grid-three/edit/{id}', 'edit')->name('footer-grid-three.edit');
    Route::put('footer-grid-three/{id}', 'update')->name('footer-grid-three.update');
    Route::delete('footer-grid-three/{id}', 'destroy')->name('footer-grid-three.destroy');
    Route::put('footer-grid-three-change-status', 'changeStatus')->name('footer-grid-three.change-status');
    Route::post('footer-grid-three/change-title', 'changeTitle')->name('footer-grid-three.change-title');
});

/** Payment Setting Route */
Route::controller(PaymentSettingController::class)->group(function () {
    Route::get('payment-settings', 'index')->name('payment-settings.index');
    Route::get('admin-payment-setting-list-style', 'adminPaymentSettingListStyle')->name('admin-payment-setting-list-style');
});
Route::controller(PaypalSettingController::class)->group(function () {
    Route::put('paypal-setting/{id}', 'update')->name('paypal-setting.update');
});
Route::controller(StripeSettingController::class)->group(function () {
    Route::put('stripe-setting/{id}', 'update')->name('stripe-setting.update');
});
Route::controller(RazorPaySettingController::class)->group(function () {
    Route::put('razorpay-setting/{id}', 'update')->name('razorpay-setting.update');
});
