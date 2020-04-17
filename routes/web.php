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

//Route::get('/mainpage', function () {
//    return view('main_page/main_page');
//});

Route::get('/mainpage', 'TwitterAccountController@index');

//Teitterログイン
Route::get('twitter/login', 'Auth\TwitterAuthController@redirectToProvider');
//Twitterコールバック
Route::get('twitter/callback', 'Auth\TwitterAuthController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
