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
Route::group(['middleware' => 'web'], function () {
});

Route::get('getHomeRepos', 'HomeController@getHomeRepos');
Route::get('addRepo', 'HomeController@addRepo');

//Faker route
Route::get('/faker','HomeController@faker');

Route::post('/search','ApiController@search');
