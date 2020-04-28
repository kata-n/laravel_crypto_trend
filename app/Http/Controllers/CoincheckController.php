<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CoincheckApi;

class CoincheckController extends Controller
{
  public function ticker(Request $request)
  {

    $strUrl = "https://coincheck.com/api/ticker";
    $file = file_get_contents($strUrl);
    $file = mb_convert_encoding($file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $result = json_decode($file,true);

    //ビットコインの価格を更新
    $cryptodb_BTC = \App\CoincheckApi::where('crypto_id', 1)->first();
    $cryptodb_BTC->crypto_high = $result['high'];
    $cryptodb_BTC->crypto_low = $result['low'];
    $cryptodb_BTC->save();

  }
}
