<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;
use Illuminate\Support\Collection;

class RankingController extends Controller
{
    public function index()
    {
      //過去1時間
      $HourCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
      $q->where('created_at', '>', date("Y-m-d H-i-s", strtotime("-1 hour")));
      }])->get();

      foreach($HourCrtptos as $HourCrtpto => $value){
         $results['Crypto_name'] = $value['name_ja'];
         $results['Tweet_count'] = $value->tweetcounts->sum('tweet_count');
         $results['Tweet_time'] = date("Y-m-d H-i-s", strtotime("-1 hour"));
         $results['Crypto_high'] = $value['crypto_high'];
         $results['Crypto_low'] = $value['crypto_low'];
         $HourCountresults[] = $results;
      }

      //ツイート数が多い順に並び替え
      foreach ((array) $HourCountresults as $key => $value) {
          $sort[$key] = $value['Tweet_count'];
      }array_multisort($sort, SORT_DESC, $HourCountresults);

      //過去２４時間
      $DayCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      foreach($DayCrtptos as $Daycrypto => $value){
         $results['Crypto_name'] = $value['name_ja'];
         $results['Tweet_count'] = $value->tweetcounts->sum('tweet_count');
         $results['Tweet_time'] = date("Y-m-d", strtotime("-1 day"));
         $results['Crypto_high'] = $value['crypto_high'];
         $results['Crypto_low'] = $value['crypto_low'];
         $DayCountresults[] = $results;
      }

      //ツイート数が多い順に並び替え
      foreach ((array) $DayCountresults as $key => $value) {
          $sort[$key] = $value['Tweet_count'];
      }array_multisort($sort, SORT_DESC, $DayCountresults);


      //過去一週間
      $WeekCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
$q->where('created_at', '>', date("Y-m-d", strtotime("-7 day")));
      }])->get();

      foreach($WeekCrtptos as $Weekcrypto => $value){
         $results['Crypto_name'] = $value['name_ja'];
         $results['Tweet_count'] = $value->tweetcounts->sum('tweet_count');
         $results['Tweet_time'] = date("Y-m-d", strtotime("-7 day"));
         $results['Crypto_high'] = $value['crypto_high'];
         $results['Crypto_low'] = $value['crypto_low'];
         $WeekCountresults[] = $results;
      }

      //ツイート数が多い順に並び替え
      foreach ((array) $WeekCountresults as $key => $value) {
          $sort[$key] = $value['Tweet_count'];
      }array_multisort($sort, SORT_DESC, $WeekCountresults);

      //JSONでVueに渡す
      return ['HourRankingData' => $HourCountresults,
              'DayRankingData' => $DayCountresults,
              'WeekRankingData' => $WeekCountresults,
             ];
    }
}
