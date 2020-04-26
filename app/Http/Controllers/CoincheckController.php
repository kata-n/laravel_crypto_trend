<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Coincheck\Coincheck;

class CoincheckController extends Controller
{
  public function ticker(Request $request)
  {

    $coincheck= new Coincheck(
      config('services.coincheck.access_key'),
      config('services.coincheck.secret_key'),
    );

    $result = $coincheck->ticker->all();

    //jsonにてVueに渡す
    return response()->json(['results' => $result]);
  }
}
