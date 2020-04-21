<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('twitter', function () {

        //Twitter情報取得
        $twitter = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );

        });
    }

    public function provides()
    {
        return ['twitter'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
