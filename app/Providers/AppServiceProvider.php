<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function bootTwitterSocialite()
    {
        $twitter = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $twitter->extend(
            'spotify',
            function ($app) use ($twitter) {
                $config = $app['config']['services.twitter'];
                return $twitter->buildProvider(TwitterProvider::class, $config);
            }
        );
    }

}
