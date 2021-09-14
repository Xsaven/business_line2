<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Notifications\DatabaseNotification;

class ClearUserNotifyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'n_clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        foreach (DatabaseNotification::all() as $notify) {

            DatabaseNotification::where('id', '!=', $notify->id)
                ->where('notifiable_type', $notify->notifiable_type)
                ->where('data', $notify->data)
                ->where('notifiable_id', $notify->notifiable_id)
                ->delete();
        }

        return 0;
    }
}
