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

        //検索クエリ指定
        $params = array(
            "q" => "仮想通貨",
            "lang" => "ja",
            "locale" => "ja",
            "count" => "4",
            "include_entities" => "false",
        );

        $result = $twitter->get('users/search', $params);

        //jsonにてVueに渡す
        return response()->json(['results' => $result]);
    }

    public function follow(Request $request)
    {
        //Twitter情報取得
        $twitter = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );

        $user_id = $request->data;
        //ユーザークエリ指定
        $params = array(
            "user_id" => $user_id
        );

        $twitter->post('friendships/create', $params);

    }
}
