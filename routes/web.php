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

//トップページ
Route::get('/', function () {
    return view('top_page/top_page');
});

//メインページ
Route::get('/mainpage', function () {
    return view('main_page/main_page');
});

//Twitterアカウントページ
Route::get('/accountpage', function () {
    return view('main_page/twitter_account_page');
});

//TwitterAPI
Route::get('/twitteraccount', 'TwitterAccountController@account');
Route::post('/twitteraccountfollow', 'TwitterAccountController@follow');

//Teitterログイン
Route::get('twitter/login', 'Auth\TwitterAuthController@redirectToProvider');
//Twitterコールバック
Route::get('twitter/callback', 'Auth\TwitterAuthController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
