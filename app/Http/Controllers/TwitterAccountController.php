<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\User;

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
        $result = $twitter2->post('friendships/create', ['screen_name'=> $user_name]);
    }

    //自動フォローを行う
    public function autofollowing(Request $request)
    {

      $users = User::where('aotofollow_flg', 1)->get();

      foreach($users as $user){

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
            "count" => "3",
            "include_entities" => "false",
        );

        $follower = $twitter->get('users/search', $params);
        $user_id = array_rand($follower);

        $result = $twitter->post('friendships/create', ['screen_name'=> $user_id]);

      }
    }

    //ログインユーザーの自動フォローONOFFを取得
    public function autofollow(Request $request)
    {
      $user_flg = Auth::user()->aotofollow_flg;
      return response()->json(['autoflg' => $user_flg], 200, [], JSON_NUMERIC_CHECK);
    }

    //ログインユーザーの自動フォローONOFF切り替え
    public function followswitch(Request $request)
    {
      $user = User::find(Auth::user()->id);
      $auto_flg = Auth::user()->aotofollow_flg;

      if($auto_flg == 1){
          //自動フォローOFF
          $user->aotofollow_flg = 0;
          $user->save();
          $auto_flg = 0;
      } else {
          //自動フォローON
          $user->aotofollow_flg = 1;
          $user->save();
          $auto_flg = 1;
      }

      return response()->json(['autoflg' => $auto_flg], 200, [], JSON_NUMERIC_CHECK);
    }

}
