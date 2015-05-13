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

Route::group(['namespace' => 'Admin'], function() {

    # Admin
    Route::group(['prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function(){

        # Categories
        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', ['as'=>'categories.index', 'uses' => 'CategoriesController@index']);
            Route::get('create', ['as'=>'category.create', 'uses' => 'CategoriesController@create']);
            Route::post('/', ['as'=>'category.store', 'uses'=> 'CategoriesController@store']);
            Route::get('{id}/destroy', ['as'=>'category.destroy', 'uses' => 'CategoriesController@destroy']);
            Route::get('{id}/edit', ['as'=>'category.edit', 'uses' => 'CategoriesController@edit']);
            Route::put('{id}/update', ['as'=>'category.update', 'uses'=>'CategoriesController@update']);
        });
        # Products
        Route::group(['prefix'=>'products'], function(){
            Route::get('/', ['as'=>'products.index', 'uses' => 'ProductsController@index']);
            Route::get('create', ['as'=>'product.create', 'uses' => 'ProductsController@create']);
            Route::post('/', ['as'=>'product.store', 'uses'=> 'ProductsController@store']);
            Route::get('{id}/destroy', ['as'=>'product.destroy', 'uses' => 'ProductsController@destroy']);
            Route::get('{id}/edit', ['as'=>'product.edit', 'uses' => 'ProductsController@edit']);
            Route::put('{id}/update', ['as'=>'product.update', 'uses'=>'ProductsController@update']);
        });

    });

});


Route::get('/', 'HomeController@index');
Route::get('example', 'WelcomeController@example');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
