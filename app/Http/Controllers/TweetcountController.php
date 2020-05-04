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

      //一階につき100件までしか取得できない為、ループ処理する
      $request_loop = 2;

      for($i=0; $i<$request_loop; $i++){

        //検索クエリ指定
        $params = array(
            "q" => $value["name"].'+#'.$value["name_ja"].' -rt -bot',
            "lang" => "ja",
            "locale" => "ja",
            "count" => "2",
            "include_entities" => "false",
        );

      $result = $twitter->get('search/tweets', $params);

      $tweet_results[] = $result;

      // これ以上取得できるツイートがあるか条件分岐
      if(isset($results->search_metadata->next_results)){
         // 次ページURLのmax_id値を取得
         $max_id = preg_replace('/.*?max_id=([\d]+)&.*/', '$1', $results->search_metadata->next_results);
         // あればmax_idをparamsに追加
         $params['max_id'] = $max_id;
      }else{
         break;
      }
    }
  }


//    jsonにてVueに渡す
      return response()->json(['results' => $tweet_results]);
  }
}
