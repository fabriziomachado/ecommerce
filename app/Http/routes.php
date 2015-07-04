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

Route::group(['namespace' => 'Admin', 'middleware' => 'auth.admin'], function() {

    # Admin
    Route::group(['prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function(){

        # Categories
        #Route::resource('categories', 'CategoriesController');
        Route::group(['prefix'=>'categories'], function(){
            Route::get('', ['as'=>'categories.index', 'uses' => 'CategoriesController@index']);
            Route::get('{id}', ['as'=>'categories.show', 'uses' => 'CategoriesController@show']);
            Route::get('create', ['as'=>'categories.create', 'uses' => 'CategoriesController@create']);
            Route::post('', ['as'=>'categories.store', 'uses'=> 'CategoriesController@store']);
            Route::get('{id}/destroy', ['as'=>'categories.destroy', 'uses' => 'CategoriesController@destroy']);
            Route::get('{id}/edit', ['as'=>'categories.edit', 'uses' => 'CategoriesController@edit']);
            Route::patch('{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
        });
        # Products
        Route::group(['prefix'=>'products'], function(){
            Route::get('', ['as'=>'products.index', 'uses' => 'ProductsController@index']);
            Route::get('{id}', ['as'=>'products.show', 'uses' => 'ProductsController@show']);
            Route::get('create', ['as'=>'products.create', 'uses' => 'ProductsController@create']);
            Route::post('/', ['as'=>'products.store', 'uses'=> 'ProductsController@store']);
            Route::get('{id}/destroy', ['as'=>'products.destroy', 'uses' => 'ProductsController@destroy']);
            Route::get('{id}/edit', ['as'=>'products.edit', 'uses' => 'ProductsController@edit']);
            Route::patch('{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);

            //Group Image
            Route::group(['prefix'=>'images'], function(){
                Route::get('{id}/product', ['as'=>'products.images', 'uses'=> 'ProductsController@images']);
                Route::get('create/{id}/product', ['as'=>'products.images.create', 'uses'=> 'ProductsController@createImage']);
                Route::post('store/{id}/product', ['as'=>'products.images.store', 'uses'=> 'ProductsController@storeImage']);
                Route::get('destroy/{id}/image', ['as'=>'products.images.destroy', 'uses'=> 'ProductsController@destroyImage']);
            });
        });

        Route::get('orders', ['as'=>'admin::orders.index', 'uses' => 'OrdersController@index']);
        Route::put('update/{id}', ['as' => 'admin::orders.update', 'uses' => 'OrdersController@update']);
        Route::get('orders/{id}/status/{status_id}', ['as'=>'admin::orders.update_status', 'uses' => 'OrdersController@update_status']);

    });

});

Route::get('/', 'StoreController@index');
Route::get('categories/{id}', ['as' => 'categories', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'product', 'uses' => 'StoreController@product']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::get('tag/{id}/products', ['as' => 'tag.products', 'uses' => 'StoreController@tag']);

Route::get('cart/{id}/qtd/{qtd}', ['as' => 'cart.update', 'uses' => 'CartController@update']);


Route::group(['middleware' => 'auth'], function() {
    Route::get('checkout/place-order', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});

Route::get('user/profile', ['as'=>'user.profile', 'uses' => 'UserProfileController@show']);

Route::get('test', [ 'uses' => 'CheckoutController@test']);



//Route::get('/', 'HomeController@index');
//Route::get('example', 'WelcomeController@example');
Route::get('home', 'StoreController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
