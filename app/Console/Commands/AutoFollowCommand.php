<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TwitterAccountController;

class AutoFollowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:autofollow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto twitter accountfollow';

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
        TwitterAccountController::autofollowing();
    }
}
