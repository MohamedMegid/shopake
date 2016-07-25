<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/**
 * Admin Login (backend)
 */
Route::get('admin/login', 'Auth\AuthController@getadmin');
Route::post('admin/login', 'Auth\AuthController@postadmin');

Route::get('orders', 'OrderController@create');
Route::post('orders', 'OrderController@store');


Route::get('/', 'OrderController@show_coming');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{

	/*
	 * Specific to Admin Logout
	 */
	Route::get('admin/logout', 'Auth\AuthController@AdminLogout');
	
Route::get('admin/category/create', 'OrderController@create_category');
Route::post('admin/category/create', 'OrderController@store_category');

	Route::get('admin/category', 'OrderController@index_category');
	Route::post('admin/category', 'OrderController@operations_category');

		Route::get('admin', 
  		['as' => 'admin/category', 'uses' => 'OrderController@index_category']);
		Route::post('admin', 
  		['as' => 'admin/category', 'uses' => 'OrderController@operations_category']);

	Route::get('admin/category/{id}/edit', 'OrderController@edit_category');
	Route::post('admin/category/{id}/edit', 'OrderController@update_category');

	Route::get('admin/category/{id}/delete', 'OrderController@show_category');
	Route::post('admin/category/{id}/delete', 'OrderController@destroy_category');
	Route::get('admin/category/all/{string}/delete', 'OrderController@show_all_category');
	Route::post('admin/category/all/{string}/delete', 'OrderController@destroy_all_category');


	Route::get('admin/order', 'OrderController@index');
	Route::post('admin/order', 'OrderController@operations');
	Route::get('admin/order/{id}/delete', 'OrderController@show');
	Route::post('admin/order/{id}/delete', 'OrderController@destroy');
	Route::get('admin/order/all/{string}/delete', 'OrderController@show_all');
	Route::post('admin/order/all/{string}/delete', 'OrderController@destroy_all');

	Route::get('admin/order/{id}/print', 'OrderController@print_invoice');
	Route::get('admin/order/{id}/details', 'OrderController@details');
});