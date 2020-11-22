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

    //BackendController
    Route::get('/', 'BackendController@showHome')->name('home.index');
    Route::get('/home', 'BackendController@showHome')->name('home.index');

    //UserController
    Route::get('/user', 'UserController@index')->name('user.index');

    //ProductController
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/add', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit'); 
        Route::post('/update', 'ProductController@update')->name('product.update');
        Route::delete('/delete', 'ProductController@destroy')->name('product.destroy');
    });

    //ProductCategoryController
    Route::prefix('product-category')->group(function(){
        Route::get('/', 'ProductCategoryController@index')->name('product_category.index');
        Route::get('/add', 'ProductCategoryController@create')->name('product_category.create');
        Route::post('/store', 'ProductCategoryController@store')->name('product_category.store');
        Route::get('/edit/{id}', 'ProductCategoryController@edit')->name('product_category.edit');
        Route::post('/update', 'ProductCategoryController@update')->name('product_category.update');
        Route::delete('/delete', 'ProductCategoryController@destroy')->name('product_category.destroy');
        Route::post('/change-status', 'ProductCategoryController@changeStatus')->name('product_category.changeStatus');
        Route::get('/filter-status','ProductCategoryController@filterStatus')->name('product_category.filter_status');
        Route::get('/pdf', 'ProductCategoryController@createPDF')->name('product_category.pdf');
        Route::get('/export-excel', 'ProductCategoryController@exportExcel')->name('product_category.export_excel');
        Route::post('/import-excel', 'ProductCategoryController@importExcel')->name('product_category.import_excel');
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

});

/*----------------- Frontend -------------*/
Route::get('/error', function () { return view('frontend.errors.404');})->name('frontend.error.404');
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/home', 'FrontendController@index')->name('frontend.home');
Route::get('/products', 'FrontendController@products')->name('frontend.products');
//Cart
Route::get('/product-detail/{id}', 'FrontendController@productDetail')->name('frontend.product_detail');
Route::get('/shopping-cart', 'FrontendController@shoppingCart')->name('frontend.shopping_cart');
Route::post('/add-to-cart', 'FrontendController@addToCart')->name('add-to-cart');
Route::get('/delete-to-cart', 'FrontendController@deleteToCart')->name('delele-to-cart');
Route::post('/update-to-cart', 'FrontendController@updateToCart')->name('update-to-cart');
//Checkout
Route::get('/login-checkout', 'FrontendController@loginCheckout')->name('login-checkout');
Route::get('/checkout', 'FrontendController@checkout')->name('checkout')->middleware('customer');

//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//CustomerLogin
Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.post');
// Route::post('/customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
Route::post('/customer/register', 'Auth\CustomerRegisterController@register')->name('customer.register');

