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
        \App\Console\Commands\TweetCountCommand::class
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
        ->everyFiveMinutes();

        //一週間前のものはテーブルから削除する
        $schedule
        ->call(function(){
          Tweetcount::query()
          ->where('created_at','<',date("Y-m-d", strtotime("tomorrow")))->delete();
        })->everyFiveMinutes();

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
