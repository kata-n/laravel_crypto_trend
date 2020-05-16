<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {

//      過去２４時間
      $DayRanking = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
        $q->sum("tweet_count");
      }])->get();

$orders = DB::table('tweetcount')
                ->select('crypto_id', DB::raw('SUM(tweet_count) as total_tweets'))
                ->groupBy('crypto_id')
                ->get();

      return ['DayRankingData' => $orders];

    }
}
