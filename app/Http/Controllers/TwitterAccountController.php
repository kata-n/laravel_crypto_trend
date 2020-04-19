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

        //ツイートを5件取得
//        $result = $twitter->get('statuses/home_timeline', array("count" => 5));

      
$tw_rest_api = 'https://api.twitter.com/1.1/users/show.json';
$request_method = 'GET';

$result = $twitter->OAuthRequest($tw_rest_api, $request_method, array('cursor' => '-1', 'screen_name' => 'mikaaaandayo'));


//        $result_json = json_decode($result, true);

        //ViewのTwitter.blade.phpに渡す
        return view('main_page/main_page', [
            "result" => $result
        ]);
    }
}
