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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware'=>['jwt.verify']],function (){
    Route::post('/logout','AuthController@logout');
    Route::patch('/profile/{id}','UserProfileController@updateUserProfile');
    Route::delete('/profile/{id}','UserProfileController@deleteUserProfile');
    Route::post('/post/{id}','PostController@addPost');
    Route::get('/post/{id}','PostController@getPost');
    Route::get('/posts/{id}','PostController@getPosts');
});