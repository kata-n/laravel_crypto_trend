<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;

class RankingController extends Controller
{

      //primaryKeyの変更
    protected $primaryKey = "crypto_id";

    public function index()
    {
      $hourRnking = CoincheckApi::find(1)->tweetcounts;

      return ['weekRankingData' => $hourRnking];

    }
}
