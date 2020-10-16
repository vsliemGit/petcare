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
Route::get('/admin/home', 'BackendController@showHome')->name('home.index');

//ProductController
Route::get('/admin/product', 'ProductController@index')->name('product.index');