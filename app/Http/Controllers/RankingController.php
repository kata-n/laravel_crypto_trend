<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoincheckApi;
use Illuminate\Support\Collection;

class RankingController extends Controller
{

    public function index()
    {

      //過去２４時間
      $DayCrtptos = CoincheckApi::
      with(['tweetcounts' => function($q){
        $q->whereDate('created_at', date("Y-m-d", strtotime("-1 day")));
      }])->get();

      foreach($DayCrtptos as $Daycrypto => $value){
         $results['Crypto_name'] = $value['name_ja'];
         $results['Tweet_count'] = $value->tweetcounts->sum('tweet_count');
         $results['Tweet_time'] = date("Y-m-d", strtotime("-1 day"));
         $results['Crypto_high'] = $value['crypto_high'];
         $results['Crypto_low'] = $value['crypto_low'];
         $Countresults[] = $results;
      }

      foreach ((array) $Countresults as $key => $value) {
          $sort[$key] = $value['Tweet_count'];
      }

      array_multisort($sort, SORT_ASC, $Countresults);

      return ['DayRankingData' => $Countresults];

    }
}
