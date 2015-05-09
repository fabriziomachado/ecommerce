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

    Route::group(['prefix'=>'admin'], function(){
        Route::get('categories', ['as'=>'categories.index', 'uses' => 'CategoriesController@index']);
        Route::get('categories/create', ['as'=>'category.create', 'uses' => 'CategoriesController@create']);
        Route::get('categories/{id}/edit', ['as'=>'category.edit', 'uses' => 'CategoriesController@edit']);
        Route::get('categories/{id}/destroy', ['as'=>'category.destroy', 'uses' => 'CategoriesController@destroy']);

        Route::get('products', ['as'=>'products.index', 'uses' => 'ProductsController@index']);
        Route::get('products/create', ['as'=>'product.create', 'uses' => 'ProductsController@create']);
        Route::get('products/{id}/edit', ['as'=>'product.edit', 'uses' => 'ProductsController@edit']);
        Route::get('products/{id}/destroy', ['as'=>'product.destroy', 'uses' => 'ProductsController@destroy']);
    });
});


Route::get('/', 'HomeController@index');
Route::get('example', 'WelcomeController@example');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
