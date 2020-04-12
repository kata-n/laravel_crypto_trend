<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
        // 初めて来た人はユーザー登録、すでにIDがあるひとは、とってくる
        return redirect('/mainpage');
//        $authUser = $this->findOrCreateUser($user);
//        // その後ログイン
//        Auth::login($authUser, true);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitterUser)
    {
        $twitterUser = TwitterUser::where('twitter_user_id', $twitter_account->id)->first();
        if($twitterUser) {
            $authUser = $twitterUser->user;
            if ($authUser){
                return $authUser;
            }
            throw new \Exception("twitter userがいるけどuserテーブルに紐づいていない");
        }
        return redirect('/mainpage');
//        $user = User::create([
//            'name' => $twitter_account->name,
//            'email' => str_random(16)."@example.com",
//            'password' => bcrypt(str_random(16)),
//        ]);
//
//        $twitter_user = new TwitterUser([
//            'twitter_user_id' => $twitter_account->id,
//            'email' => $twitter_account->email,
//            'name' => $twitter_account->name,
//            'nickname' => $twitter_account->nickname,
//            'avatar' => $twitter_account->avatar,
//            'token' => $twitter_account->token,
//            'token_secret' => $twitter_account->tokenSecret,
//        ]);

        $user->twitter_users()->save($twitter_user);
        return $user;
    }
}