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

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard/product'],function() {
    // product
    Route::get('/',             ['as'=>'product.view',      'uses'=>'ProductController@productindex']);
    Route::get('/create',       ['as'=>'product.create',    'uses'=>'ProductController@create']);
    Route::post('/store',       ['as'=>'product.store',     'uses'=>'ProductController@store']);
    Route::get('/status/{id}',  ['as'=>'product.status',    'uses' => 'ProductController@status'] );
    Route::get('/edit/{id}',    ['as'=>'product.edit',      'uses'=>'ProductController@edit']);
    Route::post('/update/{id}', ['as'=>'product.update',    'uses'=>'ProductController@update']);
    Route::get('/delete/{id}',  ['as'=>'product.delete',    'uses'=>'ProductController@destroy']);

    Route::get('/brand',                ['as'=>'brand.view',        'uses'=>'BrandController@index']);
    Route::get('/brand/create',         ['as'=>'brand.create',      'uses'=>'BrandController@create']);
    Route::post('/brand/store',         ['as'=>'brand.store',       'uses'=>'BrandController@store']);
    Route::get('/brand/edit/{id}',      ['as'=>'brand.edit',        'uses'=>'BrandController@edit']);
    Route::post('/brand/update/{id}',   ['as'=>'brand.update',      'uses'=>'BrandController@update']);
    Route::get('/brand/delete/{id}',    ['as'=>'brand.delete',      'uses'=>'BrandController@destroy']);
    Route::get('/brand/status/{id}',    ['as'=>'brand.status',    'uses' => 'BrandController@status'] );


    Route::get('/category',              ['as'=>'category.view',        'uses'=>'CategoryController@index']);
    Route::get('/category/create',       ['as'=>'categroy.create',      'uses'=>'CategoryController@create']);
    Route::post('/category/store',       ['as'=>'category.store',       'uses'=>'CategoryController@store']);
    Route::get('/category/edit/{id}',    ['as'=>'category.edit',        'uses'=>'CategoryController@edit']);
    Route::post('/category/update/{id}', ['as'=>'category.update',      'uses'=>'CategoryController@update']);
    Route::get('/category/delete/{id}',  ['as'=>'category.delete',      'uses'=>'CategoryController@destroy']);
    Route::get('/category/status/{id}',  ['as'=>'category.status',    'uses' => 'CategoryController@status'] );

    Route::get('/type',              ['as'=>'producttype.view',      'uses'=>'ProductTypeController@index']);
    Route::get('/type/create',       ['as'=>'producttype.create',    'uses'=>'ProductTypeController@create']);
    Route::post('/type/store',       ['as'=>'producttype.store',     'uses'=>'ProductTypeController@store']);
     Route::get('/type/edit/{id}',   ['as'=>'producttype.edit',      'uses'=>'ProductTypeController@edit']);
    Route::post('/type/update/{id}', ['as'=>'producttype.update',    'uses'=>'ProductTypeController@update']);
    Route::get('/type/delete/{id}',  ['as'=>'producttype.delete',    'uses'=>'ProductTypeController@destroy']);
    Route::get('/type/status/{id}',  ['as'=>'producttype.status',  'uses' => 'ProductTypeController@status'] );
});
