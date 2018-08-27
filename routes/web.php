<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Auth\LoginController@authPageCheck');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getHomeRepos', 'HomeController@getHomeRepos')->name('getHomeRepos');
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/faker','HomeController@faker');