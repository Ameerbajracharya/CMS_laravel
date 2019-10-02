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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/gallery'], function(){
    Route::get('/', 				 ['as' => 'gallery', 				  'uses' => 'GalleryController@index']);
    Route::get('/create', 			 ['as' => 'gallery.create', 		  'uses' => 'GalleryController@create']);
    Route::get('/edit/{id}', 		 ['as' => 'gallery.edit', 		 	  'uses' => 'GalleryController@edit']);
    Route::post('/store', 			 ['as' => 'gallery.store', 		 	  'uses' => 'GalleryController@store']);
    Route::post('/update/{id}',		 ['as' => 'gallery.update', 		  'uses' => 'GalleryController@update']);
    Route::post('/load-gallery-row', ['as' => 'gallery.load-gallery-row', 'uses' => 'GalleryController@loadGalleryRow']);
    Route::get('/status/{id}',  	 ['as' => 'gallery.status', 		  'uses' => 'GalleryController@status'] );
    Route::get('/delete/{id}',  	 ['as' => 'gallery.delete', 		  'uses' => 'GalleryController@destroy'] );

});
