<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CoincheckApi;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetcountController extends Controller
{
  public function counter(Request $request){


    //Twitter情報取得
    $twitter = new TwitterOAuth(
        config('services.twitter.client_id'),
        config('services.twitter.client_secret'),
        config('services.twitter.access_token'),
        config('services.twitter.access_token_secret')
    );

    //DBから銘柄を取得する
    $cryptos = \App\CoincheckApi::select('crypto_id','name','name_ja')->get()->toArray();

    foreach($cryptos as $crypto => $value) {

        //検索クエリ指定
        $params = array(
            "q" => $value['name'] + OR + $value['name_ja'],
            "lang" => "ja",
            "locale" => "ja",
            "count" => "4",
            "include_entities" => "false",
        );

      $tweet_results[] = $params;
  }

//        $result = $twitter->get('users/search', $params);

//        jsonにてVueに渡す
        return response()->json(['results' => $tweet_results]);
  }
}
