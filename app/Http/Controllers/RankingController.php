<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;
use App\Tweetcount;

class RankingController extends Controller
{

    public function index()
    {
      $Ranking = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->select(Tweetcount::raw("sum(tweet_count) as total_tweet"))->
          where('created_at', '>', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      return ['weekRankingData' => $Ranking];

    }
}
