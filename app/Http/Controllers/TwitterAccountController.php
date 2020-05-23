<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAccountController extends Controller
{
    public function account(Request $request)
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

        $user_name = $request->input('name');
        $result = $twitter->post('friendships/create', ['screen_name'=> $user_name]);

    }

    public function autofollow(Request $request){
      //ログインしているユーザーのautofollowflgを取得
      $user_flg = Auth::user()->aotofollow_flg;
      return response()->json(['autoflgs' => $user_flg]);
    }

}
