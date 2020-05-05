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

    //各銘柄毎にループ処理
    foreach($cryptos as $crypto => $value) {

      //時間指定
      $time = "since:2020-5-1_20:00:00_JST until:2020-05-01_20:10:00_JST";

      //一回につき100件までしか取得できない為、ループ処理する
      $request_loop = 2;
      for($i=0; $i<$request_loop; $i++){

        //検索クエリ指定
        $params = array(
            "q" => '$'.$value["name"].'+'.$value["name_ja"].$time.' -rt -bot',
            "lang" => "ja",
            "locale" => "ja",
            "count" => "30",
            "include_entities" => "false",
        );

        $results = $twitter->get('search/tweets', $params);

        // これ以上取得できるツイートがあるか
        if(isset($results->search_metadata->next_results)){
           // max_id値を取得
           $max_id = preg_replace('/.*?max_id=([\d]+)&.*/', '$1', $results->search_metadata->next_results);
           // max_idをparamsに追加
           $params["max_id"] = $max_id;
          //配列化
           $tweet_results[] = $results;
          

$uniqueTweets = [];
foreach ($results as $result){
   if (!in_array($result['max_id'], $tweet_results)) {
      $tweet_results[] = $result['max_id'];
      $uniqueTweets[] = $result;
   }
}

        }else{
           break;
        }
      }
    }
//    jsonにてVueに渡す
      return response()->json(['results' => $tweet_results]);
  }
}
