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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/user'], function()
{
	Route::get('/', 			['as' => 'user', 			'uses' => 'UserController@view']);
	Route::get('/create', 		['as' => 'user.create', 	'uses' => 'UserController@create']);
	Route::post('/store',	 	['as' => 'user.store',		'uses' => 'UserController@store']);
	Route::get('/edit/{id}',    ['as' => 'user.edit', 		'uses' => 'UserController@edit']);
	Route::get('/show/{id}',    ['as' => 'user.show', 		'uses' => 'UserController@show']);
	Route::post('/update/{id}', ['as' => 'user.update',		'uses' => 'UserController@update']);
	Route::get('/delete/{id}',  ['as' => 'user.delete', 	'uses' => 'UserController@delete']);
	Route::get('user_type/{id}',   ['as' => 'user.user_type',  'uses' => 'UserController@usertype'] );

});
