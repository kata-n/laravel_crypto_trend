<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\TwitterUser;
use App\TwitterAccountList;
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

        //検索クエリを指定
        $params = array(
            "q" => "仮想通貨",
            "lang" => "ja",
            "locale" => "ja",
            "count" => "5",
            "include_entities" => "false",
        );

        //API実行
        $userlists = $twitter->get('users/search', $params);

        //teitter_users_listテーブルのuser_idが既に入っているものを抽出
        $registered_list = TwitterAccountList::select('twitter_user_id')->get()->pluck('twitter_user_id');

        //teitter_users_listテーブルへAPI取得データを保存する
        foreach($userlists as $userlist => $value){
          if($registered_list->contains($value->id_str)){
            //登録されているものはテーブルを更新する;
            $user_registed = TwitterAccountList::where('twitter_user_id',$value->id_str)->first();
            $user_registed->account_name = $value->name;
            $user_registed->account_screen_name = $value->screen_name;
            $user_registed->follow_count = $value->friends_count;
            $user_registed->follower_count = $value->followers_count;
            $user_registed->account_description = $value->description;
            $user_registed->account_text = $value->status->text;
            $user_registed->save();

          }else{
            //IDが登録されていないものはteitter_users_listテーブルへAPI取得データを保存する
            $user_regist = new TwitterAccountList;
            $user_regist->twitter_user_id = $value->id_str;
            $user_regist->account_name = $value->name;
            $user_regist->account_screen_name = $value->screen_name;
            $user_regist->follow_count = $value->friends_count;
            $user_regist->follower_count = $value->followers_count;
            $user_regist->account_description = $value->description;
            $user_regist->account_text = $value->status->text;
            $user_regist->save();
          }
        }
    }

    //DBからアカウント情報を取得してJSONでVueに渡す
    public function accountshow()
    {
      $TwitterAccountData = TwitterAccountList::all();
      return response()->json(['results' => $TwitterAccountData]);
    }

    //Twitterアカウントのフォロー
    public function follow(Request $request)
    {
        //ログインIDを取得
        $user = Auth::id();
        $request_token =
        \App\TwitterUser::where('user_id', $user)->first();

        //Twitter情報取得
        $twitter = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            $request_token['token'],
            $request_token['token_secret']
        );

        $user_name = $request->input('name');
        $result = $twitter->post('friendships/create', ['screen_name'=> $user_name]);
    }

    //自動フォローを行う
    public function autofollowing(Request $request)
    {
      //自動フォローフラグを立てているユーザーを抽出
      $users = User::where('aotofollow_flg', 1)->get();

      foreach($users as $user){

        //ユーザーIDが一致するtokenとtoken_secretを抽出
        $request_token =
        \App\TwitterUser::where('user_id', $user['id'])->first();

        //Twitter情報取得
        $twitter = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            $request_token['token'],
            $request_token['token_secret']
        );

        //フォローしている人の一覧を取得する為のクエリ指定
        $params = array(
            "user_id" => $request_token['twitter_user_id'],
            "count" => "3",
            "cursor" => "-1",
            "skip_status" => false,
            "include_user_entities" => false,
        );

        //API実行
        $results = $twitter->get('friends/list', $params);

        //TwitterIDだけを取り出す
        $results = current($results);
        $twitterid_list = array_column($results,'id_str');

        //スクリーンネームだけを取り出す
//        $user_screen_name = array_column($results,'screen_name');
//        $key= array_rand( $user_screen_name, 1 );
//        $user_screen_name = $user_screen_name[$key];
//
//        $result = $twitter->post('friendships/create', ['screen_name'=> $user_screen_name]);


        // これ以上取得できるユーザーがあるか判定する
//        if(isset($results->next_cursor_str)){
//           $next_user_list = $results->next_cursor_str;
//           //paramsに追加
//           $params["cursor"] = $next_user_list;
//        }else{
//           break;
//        }

      }
        return response()->json(['results' => $twitterid_list]);
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
