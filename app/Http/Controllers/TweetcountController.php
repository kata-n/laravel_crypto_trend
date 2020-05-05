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

        $time = "since:2020-5-1_20:00:00_JST until:2020-05-01_20:15:00_JST";
        //一回につき100件までしか取得できない為、ループ処理する
        $request_loop = 3;
        for($i=0; $i<$request_loop; $i++){

          //検索クエリ指定
          $params = array(
              "q" => $value["name"].'+#'.$value["name_ja"].' -rt -bot'.$time,
              "lang" => "ja",
              "locale" => "ja",
              "count" => "5",
              "include_entities" => "false",
          );

        $result = $twitter->get('search/tweets', $params);

        // これ以上取得できるツイートがあるか
        if(isset($result->search_metadata->next_results)){
           // 次ページURLのmax_id値を取得
           $max_id = preg_replace('/.*?max_id=([\d]+)&.*/', '$1', $result->search_metadata->next_results);
           // あればmax_idをparamsに追加
           $params['max_id'] = $max_id;
           //配列化
           $tweet_results[] = $result;
        }else{
           break;
        }
      }
    }
//    jsonにてVueに渡す
      return response()->json(['results' => $tweet_results]);
  }
}
