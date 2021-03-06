<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CoincheckApi;
use App\Tweetcount;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetcountController extends Controller
{
  //つぶやきを集計する
  public static function counter()
  {
    //認証を行う
    $twitter = new TwitterOAuth(
        config('services.twitter.client_id'),
        config('services.twitter.client_secret'),
        config('services.twitter.access_token'),
        config('services.twitter.access_token_secret')
    );

    $cryptos = \App\CoincheckApi::select('crypto_id','name','name_ja')->get()->toArray();

    //各銘柄毎にループ処理
    foreach($cryptos as $crypto => $value) {

      //時間指定（現在〜前1時間毎を取得）
      $nowdate = date('Y-n-j_H:i:s');
      $onehourdate = date('Y-n-j_H:i:s',strtotime("-1 hour"));
      $time = "since:".$onehourdate."_JST until:".$nowdate."_JST";

      //一回につき100件までしか取得できない為、ループ処理する
      $request_loop = 1;
      for($i=0; $i<$request_loop; $i++){

        //検索クエリ指定
        $params = array(
            "q" => $value["name"].'+'.$value["name_ja"].$time.' -rt -Bot -replies',
            "lang" => "ja",
            "locale" => "ja",
            "count" => "100",
            "include_entities" => "false",
        );

        //API実行
        $results = $twitter->get('search/tweets', $params);
        //ツイートの数を数える
        $tweet_count = count($results->statuses);

        //DBに登録する値をセット
        $tweet_regist = new Tweetcount;
        $tweet_regist->crypto_id = $value['crypto_id'];
        $tweet_regist->tweet_count = $tweet_count;
        $tweet_regist->save();

        // これ以上取得できるツイートがあるか
        if(isset($results->search_metadata->next_results)){
           // max_id値を取得
           $max_id = preg_replace('/.*?max_id=([\d]+)&.*/', '$1', $results->search_metadata->next_results);
           // max_idをparamsに追加
           $params["max_id"] = $max_id;
        }else{
           break;
        }
      }
    }
  }
}
