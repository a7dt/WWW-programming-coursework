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

Route::get('/', 'BooksController@showBooks');
Route::post('/', 'BooksController@searchBooks');

Route::get('/add/{id}', 'CartController@addToCart');
Route::get('/showCart', 'CartController@showCart');
Route::get('/delete/{id}', 'CartController@deleteFromCart');

Route::get('/confirmOrder', 'ConfirmOrder');

Route::get('/user_index', 'UserController@getUserInfo');
Route::put('/confirmEdit/{id}', 'UserController@confirmEdit'); // Updates user information
Route::get('/myPurchases', 'UserController@myPurchases');
Route::get('/closeAccount', 'UserController@closeAccount');
Route::get('/confirmClose', 'UserController@confirmClose');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/user_control', 'AdminController@usercontrol');
Route::post('/admin/updateRole/{id}', 'AdminController@updateRole');
Route::get('/admin/book_control', 'AdminController@bookcontrol');
Route::post('/admin/add/{id}', 'AdminController@addInstance');
Route::get('/admin/delete/{id}', 'AdminController@deleteInstance');
Route::post('/admin/addBook', 'AdminController@addBook');


Auth::routes();
