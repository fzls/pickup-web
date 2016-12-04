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
/*Oauth 认证流程*/
Route::get('/oauth/redirect', function () { return view('oauth.redirect'); });
Route::get('/oauth/callback', function () { return view('oauth.callback'); });

/*账户相关界面*/
Route::get('/register', function () { return view('account.register'); });

/*首页相关*/
Route::get('/', function () { return redirect('/home'); });
Route::get('/home', function () { return view('index'); });

Route::get('/history', function () { return view('history'); });
Route::get('/ranking', function () { return view('ranking'); });
Route::get('/me', function () { return redirect('/profile'); });
Route::get('/profile', function () { return view('account.profile'); });
Route::get('/change-phone', function () { return view('account.change-phone'); });
Route::get('/account', function () { return view('account.account'); });
Route::get('/recharge', function () { return view('account.recharge'); });
Route::get('/withdraw', function () { return view('account.withdraw'); });
Route::get('/order', function () { return view('account.order'); });
Route::get('/notification', function () { return view('account.notification'); });


/*test*/
Route::get('/test', function () {
    return json_encode('meow');
});