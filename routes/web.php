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

Route::group([/*Oauth 认证流程*/], function () {
    Route::get('/oauth/redirect', 'OauthController@redirect');
    Route::get('/oauth/callback', 'OauthController@callback');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/register', 'AccountController@addNecessaryExtraInfo');



Route::get('/test', function () {
    return json_encode('meow');
});