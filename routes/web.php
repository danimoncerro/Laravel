<?php

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

Route::get('/products', 'ProductController@index');
//Route::get('/products/create', 'ProductController@create');
//Route::get('/products/{id}/edit', 'ProductController@edit');
//Route::get('/products/{id}/delete', 'ProductController@delete');
//Route::get('/products/save', 'ProductController@save');
Route::post('/products/add-to-cart/{id}', 'ProductController@addToCart');
Route::get('/products/cart', 'ProductController@cart');
Route::get('/products/cart/{id}/delete', 'ProductController@deleteFromCart');
Route::get('/products/empty-cart', 'ProductController@emptyCart');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::get('/categories/{id}/delete', 'CategoryController@delete');
Route::post('/categories/save', 'CategoryController@save');
Route::get('/categories', 'CategoryController@index');

