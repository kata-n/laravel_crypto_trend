<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

      $this->app->singleton('twitter', function () {

          $config = config::get('services.twitter');

          return new TwitterOAuth($config['api_key'], $config['secret_key'], $config['access_token'], $config['access_token_secret']);

      });
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
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['twitter'];
    }
}
