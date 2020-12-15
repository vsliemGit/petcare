<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*-----------------Backend -------------*/
Route::prefix('admin')->group(function () {
    //Error
    Route::get('/error', function () {
        return view('Error.404');
    })->name('backend.error.404');
    Route::get('/login', 'Backend\BackendController@login')->name('backend.login');
    Route::get('/register', 'Backend\BackendController@register')->name('backend.register');

    //BackendController
    Route::get('/', 'Backend\BackendController@showHome')->name('home.index')->middleware('auth');
    Route::get('/home', 'Backend\BackendController@showHome')->name('home.index');

    //Backend\UserController
    Route::get('/user', 'Backend\UserController@index')->name('user.index');

    //ProductController
    Route::prefix('product')->group(function () {
        Route::get('/', 'Backend\ProductController@index')->name('product.index');
        Route::get('/add', 'Backend\ProductController@create')->name('product.create');
        Route::post('/store', 'Backend\ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('product.edit'); 
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('product.update');
        Route::delete('/delete', 'Backend\ProductController@destroy')->name('product.destroy');
    });

    //ServiceController
    Route::prefix('service')->group(function () {
        Route::get('/', 'Backend\ServiceController@index')->name('service.index');
        Route::get('/add', 'Backend\ServiceController@create')->name('service.create');
        Route::post('/store', 'Backend\ServiceController@store')->name('service.store');
        Route::get('/edit/{id}', 'Backend\ServiceController@edit')->name('service.edit'); 
        Route::post('/update/{id}', 'Backend\ServiceController@update')->name('service.update');
        Route::delete('/delete', 'Backend\ServiceController@destroy')->name('service.destroy');
        Route::get('/detail/{id}', 'Backend\ServiceController@detail')->name('service.detail');
        Route::post('/detail/update/{id}', 'Backend\ServiceController@updateDetail')->name('service.detail_update');
        Route::post('/ckeditor/upload', 'Backend\ServiceController@upload')->name('ckeditor.upload');
    });

    //ProductCategoryController
    Route::prefix('product-category')->group(function(){
        Route::get('/', 'Backend\ProductCategoryController@index')->name('product_category.index');
        Route::get('/add', 'Backend\ProductCategoryController@create')->name('product_category.create');
        Route::post('/store', 'Backend\ProductCategoryController@store')->name('product_category.store');
        Route::get('/edit/{id}', 'Backend\ProductCategoryController@edit')->name('product_category.edit');
        Route::post('/update', 'Backend\ProductCategoryController@update')->name('product_category.update');
        Route::delete('/delete', 'Backend\ProductCategoryController@destroy')->name('product_category.destroy');
        Route::post('/change-status', 'Backend\ProductCategoryController@changeStatus')->name('product_category.changeStatus');
        Route::get('/filter-status','Backend\ProductCategoryController@filterStatus')->name('product_category.filter_status');
        Route::get('/pdf', 'Backend\ProductCategoryController@createPDF')->name('product_category.pdf');
        Route::get('/export-excel', 'Backend\ProductCategoryController@exportExcel')->name('product_category.export_excel');
        Route::post('/import-excel', 'Backend\ProductCategoryController@importExcel')->name('product_category.import_excel');
    });

    //BrandController
    Route::prefix('brand')->group(function(){
        Route::get('/', 'Backend\BrandController@index')->name('brand.index');
        Route::get('/add', 'Backend\BrandController@create')->name('brand.create');
        Route::post('/store', 'Backend\BrandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('brand.edit');
        Route::post('/update', 'Backend\BrandController@update')->name('brand.update');
        Route::delete('/delete', 'Backend\BrandController@destroy')->name('brand.destroy');
        Route::post('/change-status', 'Backend\BrandController@changeStatus')->name('brand.changeStatus');
        Route::get('/filter-status','Backend\BrandController@filterStatus')->name('brand.filter_status');
        Route::get('/pdf', 'Backend\BrandController@createPDF')->name('brand.pdf');
        Route::get('/export-excel', 'Backend\BrandController@exportExcel')->name('brand.export_excel');
        Route::post('/import-excel', 'Backend\BrandController@importExcel')->name('brand.import_excel');
    });

    //CouponController
    Route::prefix('coupon')->group(function(){
        Route::get('/', 'Backend\PromotionController@indexCoupon')->name('coupon.index');
        Route::get('/add', 'Backend\PromotionController@createCoupon')->name('coupon.create');
        Route::post('/store', 'Backend\PromotionController@storeCoupon')->name('coupon.store');
        Route::get('/edit/{id}', 'Backend\PromotionController@editCoupon')->name('coupon.edit');
        Route::post('/update', 'Backend\PromotionController@updateCoupon')->name('coupon.update');
        Route::delete('/delete', 'Backend\PromotionController@destroyCoupon')->name('coupon.destroy');
        Route::post('/change-status', 'Backend\PromotionController@changeStatusCoupon')->name('coupon.changeStatus');
        Route::get('/filter-status','Backend\PromotionController@filterStatusCoupon')->name('coupon.filter_status');
        Route::get('/pdf', 'Backend\PromotionController@createPDFCoupon')->name('coupon.pdf');
        Route::get('/export-excel', 'Backend\PromotionController@exportExcelCoupon')->name('coupon.export_excel');
        Route::post('/import-excel', 'Backend\PromotionController@importExcelCoupon')->name('coupon.import_excel');
    });

    //OrderController
     Route::prefix('order')->group(function(){
        Route::get('/', 'Backend\OrderController@index')->name('order.index');
        Route::get('/view-order/{id}', 'Backend\OrderController@viewOrder')->name('order.view_order');
        Route::post('/update', 'Backend\OrderController@update')->name('order.update');
        Route::delete('/delete', 'Backend\OrderController@destroy')->name('order.destroy');
        Route::post('/change-status', 'Backend\OrderController@changeStatus')->name('order.changeStatus');
        Route::get('/filter-status','Backend\OrderController@filterStatus')->name('order.filter_status');
        Route::get('/pdf', 'Backend\OrderController@createPDF')->name('order.pdf');
        Route::get('/export-excel', 'Backend\OrderController@exportExcel')->name('order.export_excel');
        Route::post('/import-excel', 'Backend\OrderController@importExcel')->name('order.import_excel');
    });

     //UserController
     Route::prefix('user')->group(function(){
        Route::get('/', 'Backend\UserController@index')->name('user.index');
        Route::get('/add', 'Backend\UserController@create')->name('user.create');
        Route::post('/store', 'Backend\UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('user.edit');
        Route::post('/update', 'Backend\UserController@update')->name('user.update');
        Route::delete('/delete', 'Backend\UserController@destroy')->name('user.destroy');
        Route::post('/change-status', 'Backend\UserController@changeStatus')->name('user.changeStatus');
        Route::get('/filter-status','Backend\UserController@filterStatus')->name('user.filter_status');
        Route::get('/pdf', 'Backend\UserController@createPDF')->name('user.pdf');
        Route::get('/export-excel', 'Backend\UserController@exportExcel')->name('user.export_excel');
        Route::post('/import-excel', 'Backend\UserController@importExcel')->name('user.import_excel');
    });

    //CustomerController
    Route::prefix('customer')->group(function(){
        Route::get('/', 'Backend\CustomerController@index')->name('customer.index');
        Route::get('/add', 'Backend\CustomerController@create')->name('customer.create');
        Route::post('/store', 'Backend\CustomerController@store')->name('customer.store');
        Route::get('/edit/{id}', 'Backend\CustomerController@edit')->name('customer.edit');
        Route::post('/update', 'Backend\CustomerController@update')->name('customer.update');
        Route::delete('/delete', 'Backend\CustomerController@destroy')->name('customer.destroy');
        Route::post('/change-status', 'Backend\CustomerController@changeStatus')->name('customer.changeStatus');
        Route::get('/filter-status','Backend\CustomerController@filterStatus')->name('customer.filter_status');
        Route::get('/pdf', 'Backend\CustomerController@createPDF')->name('customer.pdf');
        Route::get('/export-excel', 'Backend\CustomerController@exportExcel')->name('customer.export_excel');
        Route::post('/import-excel', 'Backend\CustomerController@importExcel')->name('customer.import_excel');
    });

});

/*----------------- Frontend -------------*/
Route::get('/error', function () { return view('frontend.errors.404');})->name('frontend.error.404');
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/get_ajax_data', 'Frontend\FrontendController@get_ajax_data');
Route::get('/home', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/products', 'Frontend\FrontendController@products')->name('frontend.products');
Route::get('/quickview', 'Frontend\FrontendController@quickview')->name('frontend.quickview');
Route::get('/product-detail/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.product_detail');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::get('/about-us', 'Frontend\FrontendController@aboutUs')->name('frontend.about_us');

//Commment
Route::post('/load-comment', 'Frontend\FrontendController@loadComment')->name('load_comment');
Route::post('/add-comment', 'Frontend\FrontendController@addComment')->name('add_comment');

//Cart
Route::get('/shopping-cart', 'Frontend\CartController@shoppingCart')->name('shopping_cart');
Route::post('/add-to-cart', 'Frontend\CartController@addToCart')->name('add-to-cart');
Route::get('/delete-to-cart', 'Frontend\CartController@deleteToCart')->name('delele-to-cart');
Route::get('/store-to-cart', 'Frontend\CartController@storeCart')->name('store-to-cart');
Route::post('/update-to-cart', 'Frontend\CartController@updateToCart')->name('update-to-cart');

//Wishlist
Route::get('/wishlist', 'Frontend\WishlistController@wishlist')->name('wishlist');
Route::post('/add-to-wishlist', 'Frontend\WishlistController@addToWishlist')->name('add-to-wishlist');
Route::get('/delete-to-wishlist', 'Frontend\WishlistController@deleteToWishlist')->name('delele-to-wishlist');

//Coupon
Route::post('/check-coupon', 'Frontend\PromotionController@checkCoupon')->name('check_coupon');

//Checkout
Route::get('/login-checkout', 'Frontend\FrontendController@loginCheckout')->name('login-checkout');
Route::get('/checkout', 'Frontend\FrontendController@checkout')->name('checkout')->middleware('customer');
Route::post('/order', 'Frontend\FrontendController@order')->name('order')->middleware('customer');
Route::get('/order-finish', 'Frontend\FrontendController@orderFinish')->name('orderFinish');

//Servies
Route::get('/services', 'Frontend\ServiceController@index')->name('servies.index');
Route::get('/services/service_single/{id}', 'Frontend\ServiceController@service_single')->name('servies.service_single');

//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//CustomerLogin
Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.post');
Route::post('/customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
Route::post('/customer/register', 'Auth\CustomerRegisterController@register')->name('customer.register');

//Profile
Route::get('/customer/profile', 'Frontend\FrontendController@profile')->name('customer.profile');
Route::get('/customer/view-order', 'Frontend\FrontendController@viewOrder')->name('customer.order.view_order');

//Paypal
Route::get('/payments/paypal-status', [
    'uses' => 'PaypalController@getPaypalPaymentStatus'
])->name('payment.status');
Route::post('/payments/purchase-with-paypal', [
    'uses' => 'PaypalController@purchaseWithPaypal'
])->name('payments.purchase');

//Locale
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

