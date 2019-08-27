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


Route::get('/home', 'PagesController@home');
Route::get('/', 'PagesController@home')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('product', 'ProductController');
Route::resource('stock', 'StockController');
Route::resource('user', 'UserController');


Route::get('/stock/{id}/create', 'StockController@create')->name('stock.create');
Route::patch('/stock/{stock}/{product_id}', 'StockController@update')->name('stock.update');

Route::get('/transactions/cancel/{transaction}', 'TransactionController@delete')->name('transactions.delete');
Route::get('/transactions/{role}', 'TransactionController@create');
Route::get('/transactions/member/{user}', 'TransactionController@showForm');

Route::get('transactions-products/back/{id}', 'TransactionProductsController@delete');

Route::resource('transactions', 'TransactionController');
Route::resource('transactions-products', 'TransactionProductsController');

// Route::get('transactions-view', 'TransactionProductsController@view')->name('transaction.view');
