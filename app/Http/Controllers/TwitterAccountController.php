<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAccountController extends Controller
{
    public function index(Request $request)
    {

        //Twitter情報取得
        $twitter = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );

        //パラメータ
        $params = array(
            "q" => "仮想通貨",
            "lang" => "ja",
            "locale" => "ja",
            "count" => "2",
    //      "until" => "2020-01-01",
    //      "since_id" => "643299864344788992",
    //      "max_id" => "643299864344788992",
            "include_entities" => "true",
        );

        $result = $twitter->get('search/tweets', $params)->statuses;

        //jSONでVueに渡す
        return response()->json(['results' => $result]);
    }
}
