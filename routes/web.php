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
//Error
Route::get('admin/error', function () {
    return view('Error.404');
})->name('backend.error.404');

//BackendController
Route::get('/admin', 'BackendController@showHome')->name('home.index');
Route::get('/admin/home', 'BackendController@showHome')->name('home.index');

//UserController
Route::get('/admin/user', 'UserController@index')->name('user.index');

//ProductController
Route::prefix('admin')->group(function () {
    Route::get('product', 'ProductController@index')->name('product.index');
    Route::get('product/add', 'ProductController@create')->name('product.create');
    Route::post('pruduct/store', 'ProductController@store')->name('product.store');
    Route::get('pruduct/edit/{id}', 'ProductController@edit')->name('product.edit'); 
    Route::post('pruduct/update', 'ProductController@update')->name('product.update');
    Route::delete('product/delete', 'ProductController@destroy')->name('product.destroy');
});


//ProductCategoryController
Route::prefix('admin')->group(function(){
    Route::get('product-category', 'ProductCategoryController@index')->name('product_category.index');
    Route::get('product-category/add', 'ProductCategoryController@create')->name('product_category.create');
    Route::post('product-category/store', 'ProductCategoryController@store')->name('product_category.store');
    Route::get('product-category/edit/{id}', 'ProductCategoryController@edit')->name('product_category.edit');
    Route::post('product-category/update', 'ProductCategoryController@update')->name('product_category.update');
    Route::delete('product-category/delete', 'ProductCategoryController@destroy')->name('product_category.destroy');
    Route::post('product-category/change-status', 'ProductCategoryController@changeStatus')->name('product_category.changeStatus');
    Route::get('product-category/filter-status','ProductCategoryController@filterStatus')->name('product_category.filter_status');
    Route::get('product-category/pdf', 'ProductCategoryController@createPDF')->name('product_category.pdf');
    Route::get('product-category/export-excel', 'ProductCategoryController@exportExcel')->name('product_category.export_excel');
    Route::post('product-category/import-excel', 'ProductCategoryController@importExcel')->name('product_category.import_excel');
});


//BrandController
Route::prefix('admin')->group(function(){
    Route::get('brand', 'Backend\BrandController@index')->name('brand.index');
    Route::get('brand/add', 'Backend\BrandController@create')->name('brand.create');
    Route::post('brand/store', 'Backend\BrandController@store')->name('brand.store');
    Route::get('brand/edit/{id}', 'Backend\BrandController@edit')->name('brand.edit');
    Route::post('brand/update', 'Backend\BrandController@update')->name('brand.update');
    Route::delete('brand/delete', 'Backend\BrandController@destroy')->name('brand.destroy');
    Route::post('brand/change-status', 'Backend\BrandController@changeStatus')->name('brand.changeStatus');
    Route::get('brand/filter-status','Backend\BrandController@filterStatus')->name('brand.filter_status');
    Route::get('brand/pdf', 'Backend\BrandController@createPDF')->name('brand.pdf');
    Route::get('brand/export-excel', 'Backend\BrandController@exportExcel')->name('brand.export_excel');
    Route::post('brand/import-excel', 'Backend\BrandController@importExcel')->name('brand.import_excel');
});


/*----------------- Frontend -------------*/
Route::get('/error', function () { return view('frontend.errors.404');})->name('frontend.error.404');
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/home', 'FrontendController@index')->name('frontend.home');
Route::get('/products', 'FrontendController@products')->name('frontend.products');
Route::get('/product-detail/{id}', 'FrontendController@productDetail')->name('frontend.product_detail');
Route::get('/shopping-cart', 'FrontendController@shoppingCart')->name('frontend.shopping_cart');
Route::post('/add-to-cart', 'FrontendController@addToCart')->name('add-to-cart');
Route::get('/delete-to-cart', 'FrontendController@deleteToCart')->name('delele-to-cart');