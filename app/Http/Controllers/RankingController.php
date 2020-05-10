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
        $q->where('created_at', '>', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      $DayRankingData = [
        'name' => $Rnking('name'),
        'name_ja' => $Rnking('name_ja'),
        'crypto_high' => $Rnking('crypto_high'),
        'crypto_low' => $Rnking('crypto_low'),
        'tweet_count' => $Rnking->tweetcounts->tweet_count
      ]

      return ['weekRankingData' => $DayRankingData];

    }
}
