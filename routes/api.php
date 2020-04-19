<?php

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


 Route::get("/data", function(){
  $twitter = new TwitterOAuth(
      config('services.twitter.client_id'),
      config('services.twitter.client_secret'),
      config('services.twitter.access_token'),
      config('services.twitter.access_token_secret')
  );
        //パラメータ
        $params = array(
            "q" => "仮想通貨",
            "lang" => "ja",
            "locale" => "ja",
            "count" => "6",
    //      "until" => "2020-01-01",
    //      "since_id" => "643299864344788992",
    //      "max_id" => "643299864344788992",
            "include_entities" => "true",
        );
  $sourceUrl = "https://api.twitter.com/1.1/search/tweets.json";
  $responseData = $twitter -> request("GET", $sourceUrl, $params);
  $responseBody = json_decode($responseData -> getBody() -> getContents(), true);
  return [
   "status" => "OK",
   "data" => $responseBody,
  ];
 })
