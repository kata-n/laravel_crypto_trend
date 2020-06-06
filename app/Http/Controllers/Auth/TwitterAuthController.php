<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\TwitterUser;

class TwitterAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider()
    {
        return Socialite::with('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $data = Socialite::with('twitter')->user();
        //Twitterデータがtwitter_usersテーブルに登録されているか確認
        $authUser = TwitterUser::where('twitter_user_id', $data->id)->first();

        if(!empty($authUser->user->id)){
          //すでにユーザー登録している場合
          Auth::login($authUser->user);
          return redirect('/mainpage')->with('flash_message', 'ログインしました');
        } else {
          //ユーザー登録していない場合は、Twitter情報をセッションに保存し新規会員登録へ遷移する
          session(['twitter' => $data]);
          return redirect('register')->with('flash_message', 'こちらのユーザー登録も行ってください');
        }
    }
}