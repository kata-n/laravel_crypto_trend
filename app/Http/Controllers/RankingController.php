<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {
      $hourRnking = CoincheckApi::find()->tweetcounts;

      return ['weekRankingData' => $hourRnking];

    }
}
