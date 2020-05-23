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

//認証
Auth::routes();

//トップページ
Route::get('/', function () {
    return view('top_page/top_page');
});

//メインページ
Route::get('/mainpage', 'MainpageController@index');

//Twitterアカウント一覧表示ページ
Route::get('/accountpage', 'MainpageController@accountlist');

//googleNewsページ
Route::get('/newspage', 'MainpageController@shownews');

//Tweet数ランキングAPI
Route::get('/tweetcount', 'TweetcountController@counter');

//TwitterAPI
Route::get('/twitteraccount', 'TwitterAccountController@account');
Route::post('/twitteraccountfollow', 'TwitterAccountController@follow');
//自動フォローしているか確認
Route::get('/twitterautofollow', 'TwitterAccountController@ Autofollow');

//CoincheckAPI
Route::get('/ticker', 'CoincheckController@ticker');

//GoogleNewsAPI
Route::get('/newslist', 'GoogleNewsController@shownews');

//ランキング情報取得
Route::get('/ranking', 'RankingController@index');

//Teitterログイン
Route::get('twitter/login', 'Auth\TwitterAuthController@redirectToProvider');
//Twitterコールバック
Route::get('twitter/callback', 'Auth\TwitterAuthController@handleProviderCallback');


