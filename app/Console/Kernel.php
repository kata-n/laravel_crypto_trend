<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Tweetcount;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\CoincheckCommand::class,
        \App\Console\Commands\TweetCountCommand::class,
        \App\Console\Commands\AccountSearchCommand::class,
        \App\Console\Commands\AutoFollowCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule
        ->command('command:coincheck')
        ->withoutOverlapping()
        ->daily();

        $schedule
        ->command('command:gettweet')
        ->hourlyAt(40);

        //一週間前のものはテーブルから削除する
        $schedule
        ->call(function(){
          Tweetcount::query()
          ->where('created_at','<',date("Y-m-d", strtotime("-7 day")))->delete();
        })->dailyAt('13:00');

        $schedule
        ->command('command:searchaccount')
        ->withoutOverlapping()
        ->dailyAt('2:00');

        $schedule
        ->command('command:autofollow')
        ->withoutOverlapping()
        ->hourlyAt(15);

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
