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


Route::get('/', 'ProductController@index')->name('price');
Route::post('/', 'ProductController@addProduct')->name('add_product');
Route::delete('/{product}', 'ProductController@deleteProduct')->name('delete_product');

