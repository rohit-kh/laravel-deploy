<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
    'prefix'=>'auth',
], function ($router){
    Route::post('login', 'AuthAPIController@login');
    Route::post('register', 'AuthAPIController@register');
    Route::post('logout', 'AuthAPIController@logout');
    Route::get('profile', 'AuthAPIController@profile');
    Route::post('refresh', 'AuthAPIController@refresh');
});

Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
], function ($router){
    Route::resource('todos', 'TodoAPIController');
});

Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
], function ($router){
    Route::resource('product', 'ProductsAPIController');
});

Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
], function ($router){
    Route::resource('product/{productId}/comment', 'CommentsAPIController');
});
