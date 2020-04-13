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
        // 初めて来た人はユーザー登録、すでにIDがある場合はデータ取得
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        // その後ログイン
        return redirect('/mainpage');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitter_account)
    {
        $twitterUser = TwitterUser::where('twitter_user_id', $twitter_account->id)->first();

        //twitterを登録している場合
        if($twitterUser) {
            $authUser = $twitterUser->user;
            if ($authUser){
              return $authUser;
            }
            throw new \Exception("登録しているが、userテーブルに紐づいていない");
            return redirect('/');
        }else{
            //twitter登録していない場合
            session(['twitter' => $twitter_account]);
            return redirect('/login');
        }

        $user->twitter_users()->save($twitter_user);
        return $user;
    }
}