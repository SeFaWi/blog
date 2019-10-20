<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//     Route::post('login', 'AuthController@login');
// });
Route::post('login', 'AuthController@login');
Route::post('signup', 'AuthController@signup');
Route::put('user/{id}',  'UserController@update');
Route::get('user/{id}', 'UserController@show');
Route::get('user', 'UserController@index');
Route::resource('comment', 'CommentController');
//Route::get('postt', 'postController@getcomment');
 Route::resource('posts', 'PostController');
 Route::resource('comments', 'CommentController');
Route::post('fileUpload', 'PostController@fileUpload');
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {
    Route::put('user/{id}/{update}',  'UserController@update');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

});
