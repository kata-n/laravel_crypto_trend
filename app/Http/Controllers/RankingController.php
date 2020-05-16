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
      $DayCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

$DayCrtptos = array();

foreach ($DayCrtptos as $DayCrtpto) {
$ar_total = array_reduce($DayCrtpto, function($carry, $item){
            return $carry += $item['tweet_count'];
        });
}

      return ['DayRankingData' => $as_total];

    }
}
