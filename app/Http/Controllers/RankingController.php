<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;
use App\Tweetcount;

class RankingController extends Controller
{

    public function index()
    {

//      過去２４時間
      $DayRanking = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->sum("tweet_count")->get();
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      return ['DayRankingData' => $DayRanking];

    }
}
