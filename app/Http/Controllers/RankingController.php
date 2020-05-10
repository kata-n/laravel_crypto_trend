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
        $q->select('id','tweet_count','created_at');
        $q->where('created_at', '>', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      $DayRankingData = [
        'name' => $Ranking->pluck('user.name')->all()
      ];

      return ['weekRankingData' => $Ranking];

    }
}
