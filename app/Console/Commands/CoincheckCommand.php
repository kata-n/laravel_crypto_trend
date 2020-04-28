<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use APP\HTTP\Controllers\CoincheckController;

class CoincheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:coincheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get BTC information';

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
        CoincheckController::ticker();
    }
}
