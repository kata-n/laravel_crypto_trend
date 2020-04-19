<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAccountController extends Controller
{
    public function index(Request $request)
    {
//        //Twitter情報取得
//        $twitter = new TwitterOAuth(
//            config('services.twitter.client_id'),
//            config('services.twitter.client_secret'),
//            config('services.twitter.access_token'),
//            config('services.twitter.access_token_secret')
//        );

        //ツイートを5件取得
//        $result = $twitter->get('statuses/home_timeline', array("count" => 5));
 $result = \Twitter::get('statuses/home_timeline', array("count" => 5));
        //ViewのTwitter.blade.phpに渡す
        return view('main_page/main_page', [
            "result" => $result
        ]);
    }
}
