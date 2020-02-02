<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/products/check', 'ProductsController@checkIfSame');


//Logins/Register
Route::post('/signin', 'Auth\LoginController@signin')->middleware('api_token');
Route::post('/signup', 'Auth\RegisterController@signup')->middleware('api_token');
Route::post('/signout', 'Auth\LoginController@signout')->middleware('api_token');

//Users
Route::get('/users', 'UsersController@index');
Route::post('/users/create', 'UsersController@store');
Route::post('/users/update', 'UsersController@updateUser');
Route::post('/users/delete', 'UsersController@destroy');
Route::post('/users/prompt', 'UsersController@promptAuth');
Route::post('/users/getAuthedUser', 'UsersController@getAuthenticatedUser');
Route::post('/users/refresh', 'UsersController@refreshToken');

//Makes a route to call a function of a specific class

//Orders
Route::get('/orders', 'OrdersController@index');
Route::post('/orders/create', 'OrdersController@store');
Route::post('/orders/update', 'OrdersController@update');
Route::post('/orders/delete', 'OrdersController@destroy');
Route::post('/orders/user', 'OrdersController@getUserOrders');

//Order Items
Route::get('/order_items', 'OrderItemsController@index');
Route::post('/order_items/create', 'OrderItemsController@store');
Route::post('/order_items/update', 'OrderItemsController@update');
Route::post('/order_items/delete', 'OrderItemsController@destroy');

//Categories
Route::get('/categories', 'CategoriesController@index');
Route::post('/categories/create', 'CategoriesController@store');
Route::post('/categories/delete', 'CategoriesController@destroy');
Route::post('/categories/update', 'CategoriesController@update');

//Productsc
Route::get('/products', 'ProductsController@index');
Route::post('/products/store', 'ProductsController@store');
Route::post('/products/delete', 'ProductsController@delete');
Route::post('/products/update', 'ProductsController@update');

//PDF's
Route::get('/pdfs', 'PdfsController@index');
Route::post('/pdfs/create', 'PdfsController@store');
Route::get('/pdfs/download', 'PdfsController@download');

//Cart
Route::get('/addtocart', 'CartController@store');
Route::get('/viewcart', 'CartController@index');

Route::get('/sizes', 'SizeController@index');
Route::post('/sizes/create', 'SizeController@store');
Route::post('/sizes/update', 'SizeController@update');
Route::post('/sizes/delete', 'SizeController@destroy');