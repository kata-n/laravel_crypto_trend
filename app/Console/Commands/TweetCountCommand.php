<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TweetcountController;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\DB;
use App\Tweetcount;

class TweetCountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:gettweet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Tweet count';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        TweetcountController::counter();
    }
}
