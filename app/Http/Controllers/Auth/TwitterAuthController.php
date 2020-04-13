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
        $user = Socialite::with('twitter')->user();
        // 初めて来た人はユーザー登録、すでにIDがあるひとはデータ取得
        $authUser = $this->findOrCreateUser($user);
        if(!empty($authUser[0]->user->id)){
          //ログインしている場合
          Auth::login($authUser[0]->user);
          return redirect('/mainpage')->with('status', 'ログインしました');
        } else {
          //まだログインしたことない場合 情報をセッションに保存し新規会員登録へ
          session(['twitter' => $user]);
          return redirect('login')->with('status', 'Twitter連携しました');
        }
    }
}