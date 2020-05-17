<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;
use Illuminate\Support\Collection;

class RankingController extends Controller
{

    public function index()
    {

//      過去２４時間
      $DayCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

    foreach($DayCrtptos as $Daycrypto){
       $results = $Daycrypto->sum('tweet_count');
           $Countresults[] = $results;
    }


      return ['DayRankingData' => $Countresults];

    }
}
