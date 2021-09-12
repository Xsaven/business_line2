<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class LocalCron.
 * @package App\Console\Commands
 */
class LocalCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'local:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Developer cron for in macos';

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
     * @return int
     */
    public function handle()
    {
        while (true) {
            $this->call('schedule:run');

            sleep(60);
        }

        return 0;
    }
}
