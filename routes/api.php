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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});



Route::post('login', 'AuthController@login');
Route::post('signup', 'AuthController@signup');









Route::get('user', 'UserController@index');
Route::resource('comment', 'CommentController');



//Route::get('postt', 'postController@getcomment');
Route::resource('post', 'PostController');

Route::post('fileUpload', 'PostController@fileUpload');





Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

});
