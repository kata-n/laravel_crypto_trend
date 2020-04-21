<?php
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterConnection()
{
    public function connect()
    {
        return new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );
    }
}