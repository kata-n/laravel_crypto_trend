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
        //ユーザー登録Twitterデータ確認
        $authUser = TwitterUser::where('twitter_user_id', $data->id)->first();
var_dump($authUser);
        if(!empty($authUser[0]->user->id)){
          //ユーザー登録している場合
          Auth::login($authUser[0]->user);
          return redirect('/mainpage')->with('status', 'ログインしました');
        } else {
          //ユーザー登録していない場合は、Twitter情報をセッションに保存し新規会員登録へ
          session(['twitter' => $data]);
          return redirect('register')->with('status', 'ユーザー登録を行ってください');
        }
    }
}