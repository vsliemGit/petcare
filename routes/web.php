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
Route::get('/admin/product', 'ProductController@index')->name('product.index');
Route::get('/admin/product/add', 'ProductController@create')->name('product.create');
Route::post('/admin/pruduct/store', 'ProductController@store')->name('product.store');
Route::get('/admin/pruduct/edit/{id}', 'ProductController@edit')->name('product.edit'); 
Route::post('/admin/pruduct/update', 'ProductController@update')->name('product.update');
Route::delete('/admin/product/delete', 'ProductController@destroy')->name('product.destroy');

//ProductCategoryController
Route::get('/admin/product-category', 'ProductCategoryController@index')->name('product_category.index');
Route::get('/admin/product-category/add', 'ProductCategoryController@create')->name('product_category.create');
Route::post('/admin/product-category/store', 'ProductCategoryController@store')->name('product_category.store');
Route::get('/admin/product-category/edit/{id}', 'ProductCategoryController@edit')->name('product_category.edit');
Route::post('/admin/product-category/update', 'ProductCategoryController@update')->name('product_category.update');
Route::delete('/admin/product-category/delete', 'ProductCategoryController@destroy')->name('product_category.destroy');
Route::post('/admin/product-category/change-status', 'ProductCategoryController@changeStatus')->name('product_category.changeStatus');
Route::get('/admin/product-category/filter-status','ProductCategoryController@filterStatus')->name('product_category.filter_status');
Route::get('/admin/product-category/pdf', 'ProductCategoryController@createPDF')->name('product_category.pdf');
Route::get('/admin/product-category/export-excel', 'ProductCategoryController@exportExcel')->name('product_category.export_excel');
Route::post('/admin/product-category/import-excel', 'ProductCategoryController@importExcel')->name('product_category.import_excel');

//BrandController
Route::get('/admin/brand', 'Backend\BrandController@index')->name('brand.index');
Route::get('/admin/brand/add', 'Backend\BrandController@create')->name('brand.create');
Route::post('/admin/brand/store', 'Backend\BrandController@store')->name('brand.store');
Route::get('/admin/brand/edit/{id}', 'Backend\BrandController@edit')->name('brand.edit');
Route::post('/admin/brand/update', 'Backend\BrandController@update')->name('brand.update');
Route::delete('/admin/brand/delete', 'Backend\BrandController@destroy')->name('brand.destroy');
Route::post('/admin/brand/change-status', 'Backend\BrandController@changeStatus')->name('brand.changeStatus');
Route::get('/admin/brand/filter-status','Backend\BrandController@filterStatus')->name('brand.filter_status');
Route::get('/admin/brand/pdf', 'Backend\BrandController@createPDF')->name('brand.pdf');
Route::get('/admin/brand/export-excel', 'Backend\BrandController@exportExcel')->name('brand.export_excel');
Route::post('/admin/brand/import-excel', 'Backend\BrandController@importExcel')->name('brand.import_excel');


/*----------------- Frontend -------------*/
Route::get('/error', function () {
    return view('frontend.errors.404');
})->name('frontend.error.404');
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/home', 'FrontendController@index')->name('frontend.home');
Route::get('/products', 'FrontendController@products')->name('frontend.products');
Route::get('/product-detail/{id}', 'FrontendController@productDetail')->name('frontend.product_detail');
    /** Cart */
Route::get('/shopping-cart', 'FrontendController@shoppingCart')->name('frontend.shopping_cart');
Route::post('/add-to-cart', 'FrontendController@addToCart')->name('add-to-cart');
Route::get('/delete-to-cart', 'FrontendController@deleteToCart')->name('delele-to-cart');