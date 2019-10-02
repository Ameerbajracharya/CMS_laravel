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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/multimedia'], function(){
    Route::get('/', ['as' => 'viewmultimedia','uses'=>'MultimediaController@view']);

    // route forstore
    Route::get('/create', ['as' => 'createmultimedia','uses'=>'MultimediaController@create']);
    Route::post('/add', ['as' => 'addmultimedia','uses'=>'MultimediaController@store']);

    // route for edit and update
    Route::get('/edit/{id}', ['as' => 'editmultimedia','uses'=>'MultimediaController@edit']);
    Route::post('/update/{id}', ['as' => 'updatemultimedia','uses'=>'MultimediaController@update']);

    //
    Route::get('/delete/{id}', ['as' => 'deletemultimedia','uses'=>'MultimediaController@destroy']);

    Route::get('/multimedia/status/{id}',  ['as' => 'multimediastatus', 'uses' => 'multimediaController@status'] );


});
