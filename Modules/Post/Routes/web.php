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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/post','as'=>'post.'], function()
{
    Route::get('/', 'PostController@index');


    Route::get('/create',  ['uses'=>'PostController@create','as'=>'create']);
    Route::post('/store',  ['uses'=>'PostController@store','as'=>'store']);

    Route::get('/view',  ['uses'=>'PostController@view','as'=>'view']);

    Route::get('/edit/{id}',  ['uses'=>'PostController@edit','as'=>'edit']);
    Route::post('/update/{id}',  ['uses'=>'PostController@update','as'=>'update']);

    Route::get('/delete/{id}',  ['uses'=>'PostController@destroy','as'=>'delete']);

    


});
