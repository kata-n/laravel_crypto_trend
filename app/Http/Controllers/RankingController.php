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
        $q->where('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

//      $DayRankingData = [
//        'name' => $Ranking->name,
//        'name_ja' => $Ranking->'name_ja'),
//        'crypto_high' => $Ranking('crypto_high'),
//        'crypto_low' => $Ranking('crypto_low'),
//        'tweet_count' => $Ranking->tweetcounts->tweet_count
//      ];

      return ['weekRankingData' => $Ranking];

    }
}
