<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {

      //過去２４時間
//      $DayRanking = CoincheckApi::
//      with(['tweetcounts' => function($q){
//        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
//      }])->get();

      $DayRanking = CoincheckApi::withCount('tweetcounts')
    ->orderByDesc('tweet_count')
    ->get();

      return ['DayRankingData' => $DayRanking];

    }
}
