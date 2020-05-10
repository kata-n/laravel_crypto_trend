<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

    public function index()
    {
      $hourRnking = CoincheckApi::
      select('name_ja','tweet_count')->tweetcounts()
      ->groupBy('rankings.user_id')
      ->get(5);

      return ['weekRankingData' => $hourRnking];

    }
}
