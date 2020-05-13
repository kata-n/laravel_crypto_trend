<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {

      $yseterday = date("Y-m-d");
      $Ranking = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->where('created_at', date("Y-m-d", strtotime($yseterday)));
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
