<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {
      $DayRnking = CoincheckApi::with([
        'tweetcounts' => function($q){
        $q->('created_at', '>', date("Y-m-d", strtotime("-1 day");
        ))
      }])->get();


      return ['weekRankingData' => $DayRnking];

    }
}
