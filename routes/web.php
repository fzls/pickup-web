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

Route::group([/*账户相关界面*/], function () {
    Route::get('/register', 'AccountController@addNecessaryExtraInfo');
});

Route::group([/*首页相关*/], function () {
    Route::get('/', 'HomeController@homepage');
    Route::get('/home', 'HomeController@homepage');
});

Route::get('/history',function (){
    return view('history');
});

Route::get('/ranking',function (){
    return view('ranking');
});

Route::get('/me',function (){
    return redirect('/profile');
});

Route::get('/profile',function (){
    return view('account.profile');
});

Route::get('/change-phone',function (){
    return view('account.change-phone');
});



Route::get('/test', function () {
    return json_encode('meow');
});