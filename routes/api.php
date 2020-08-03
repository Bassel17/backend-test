<?php

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
    Route::get('/profile/{id}','UserProfileController@getUserProfile');
    Route::patch('/profile/{id}','UserProfileController@updateUserProfile');
    Route::delete('/profile/{id}','UserProfileController@deleteUserProfile');
    Route::post('/post/{id}','PostController@addPost');
    Route::get('/post/{id}','PostController@getPost');
    Route::patch('/post/{id}','PostController@updatePost');
    Route::delete('/post/{id}','PostController@deletePost');
    Route::get('/posts/{id}','PostController@getPosts');
    Route::get('/check',function(){
        return response()->json(['message' => 'user has right to access',"status"=>200],200);
    });
});