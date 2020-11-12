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
//Error
Route::get('/error', function () {
    return view('Error.404');
})->name('error.404');

/*-----------------Backend -------------*/

//BackendController
Route::get('/admin', 'BackendController@showHome')->name('home.index');
Route::get('/admin/home', 'BackendController@showHome')->name('home.index');

//ProductController
Route::get('/admin/product', 'ProductController@index')->name('product.index');
Route::get('/admin/product/add', 'ProductController@create')->name('product.create');
Route::post('/admin/pruduct/store', 'ProductController@store')->name('product.store');
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
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/home', 'FrontendController@index')->name('frontend.home');
Route::get('/index', 'FrontendController@index')->name('frontend.home');