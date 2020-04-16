<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class TwitterAccountController extends Controller
{
    public function index()
    {
//        //ツイートを5件取得
//        $result = \Twitter::get('statuses/home_timeline', array("count" => 5));
//
//        //ViewのTwitter.blade.phpに渡す
//        return view('main_page/main_page', [
//            "result" => $result
//        ]);
//          return view('main_page/main_page');
    }
}
