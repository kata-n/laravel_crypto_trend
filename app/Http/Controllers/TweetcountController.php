<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CoincheckApi;

class TweetcountController extends Controller
{
  public function counter(Request $request){

    //DBから銘柄を取得する
    $cryptos = \App\CoincheckApi::select('crypto_id','name','name_ja')->get();

    foreach ($cryptos as $crypto) {

      $crypto_name = $crypto['name']
      $crypt_name_ja = $crypyo['name_ja'];

    }
  }
}
