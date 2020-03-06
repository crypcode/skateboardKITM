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
    return view('shopend.main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addCat', 'CategoryController@add_cat');
Route::get('/addItem', 'ItemController@addItem');
Route::get('/', 'ItemController@showAll');
Route::get('/itemList', 'ItemController@showAll');
Route::post('/store-item', 'ItemController@store_item');
Route::post('/store-category', 'CategoryController@store_cat');
Route::get('/delete/item/{item}', 'ItemController@deleteItem');
Route::get('/update/item/{item}', 'ItemController@itemUpdate');
Route::post('/UpdateItem/{item}', 'ItemController@updateItem');
Route::get('/CatControl', 'CategoryController@controlCat');
Route::get('/delete/category/{category}', 'CategoryController@deleteCat');
Route::get('/delete/order/{order}', 'OrderController@deleteOrder');
Route::get('/Orders', 'OrderController@showOrders');
Route::post('/updateStatus/order/{order}', 'OrderController@updateStatus');
Route::get('/logout', 'HomeController@logout');

