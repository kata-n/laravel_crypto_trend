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
        $q->where('created_at', '=', date("Y-m-d", strtotime("-1 day")));
        $q->where('tweet_count')->sum('tweet_count');
      }])->get();

      $DayRankingData = [
        'name' => $Ranking->pluck('user.name')->all()
      ];

      return ['weekRankingData' => $Ranking];

    }
}
