<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CoincheckController extends Controller
{
  public function ticker(Request $request)
  {

      $strUrl = "https://coincheck.com/api/ticker";
      $file = file_get_contents($strUrl);
      $file = mb_convert_encoding($file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      $result = json_decode($file,true);

    //jsonにてVueに渡す
    return response()->json(['results' => $result]);
  }
}
