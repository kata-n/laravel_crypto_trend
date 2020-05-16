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

      $f_total = 0;
foreach ($DayCrtptos as $DayCrtpto) {
    $f_total += $DayCrtpto['tweetcounts']['tweet_count'];
}

      return ['DayRankingData' => $f_total];

    }
}
