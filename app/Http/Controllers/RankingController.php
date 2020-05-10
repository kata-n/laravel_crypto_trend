<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {
      $hourRnking = CoincheckApi::
      find()->tweetcounts()
      ->where('name_ja','tweet_count')
      ->groupBy('rankings.user_id')
      ->get(5);

      return ['weekRankingData' => $hourRnking];

    }
}
