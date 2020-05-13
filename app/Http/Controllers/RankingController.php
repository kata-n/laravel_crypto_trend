<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {

      $Ranking = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->where('created_at', date("Y-m-d H:i:s", strtotime("-1 day")));
      }])->get();

//      $Ranking = CoincheckApi::
//      with(['tweetcounts' => function($q){
//        $q->where('created_at', '=', date("Y-m-d", strtotime("-1 day")));
//      }])->get();

//
//      $DayRankingData = [
//
//        'tweet_count' => $Ranking->tweetcounts->sum(tweet_count)
//      ];

      return ['weekRankingData' => $Ranking];

    }
}
