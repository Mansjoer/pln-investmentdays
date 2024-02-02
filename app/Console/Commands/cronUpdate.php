<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cronUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cron-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run queue work every 5 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
