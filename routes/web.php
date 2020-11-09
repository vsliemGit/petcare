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

Route::get('/', function () {
    return view('welcome');
});

//Error
Route::get('/error', function () {
    return view('Error.404');
})->name('error.404');

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
Route::post('/admin/product-category/change-status', 'ProductCategoryController@changeStatus')->name('product_category.changeStatus');Route::get('/admin/product-category/filter-status','ProductCategoryController@filterStatus')->name('product_category.filter_status');
Route::get('/admin/product-category/pdf', 'ProductCategoryController@createPDF')->name('product_category.pdf');
Route::get('/admin/product-category/export-excel', 'ProductCategoryController@exportExcel')->name('product_category.export_excel');
Route::post('/admin/product-category/import-excel', 'ProductCategoryController@importExcel')->name('product_category.import_excel');