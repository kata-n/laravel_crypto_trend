<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Twitter;

class TwitterAccountController extends Controller
{
//    public function index(Request $request)
//    {
//
//      $config = config('services');
//
//      $twitter = new TwitterOAuth($config['api_key'], $config['secret_key'], $config['access_token'], $config['access_token_secret']);
//
//        //ツイートを5件取得
//        $result = $twitter->get('statuses/home_timeline', array("count" => 5));
//
//        //ViewのTwitter.blade.phpに渡す
//        return view('main_page/main_page', [
//            "result" => $result
//        ]);
//    }
    public function index() {
        $tweets = Twitter::getUserTimeline([
            'count'       => 10,
            'format'      => 'json'
        ]);

        dd($tweets);

        return view('main_page/main_page');
    }

    public function about() {
        return view('about');
    }
}
