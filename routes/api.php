<?php

use App\Order;
use App\Post;
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

// public routes
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

// authinticated routes
Route::middleware('auth:api')->group(function () {
    Route::namespace('Api')->group(function () {
        //Auth
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@getUser');

        //Posts
        Route::get('posts', 'PostController@getPosts');
        Route::get('post', 'PostController@getPost');
        Route::post('post', 'PostController@createPost');

        //Orders
        Route::get('orders', 'OrderController@getOrders');
    });
});
