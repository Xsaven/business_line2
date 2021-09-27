<?php

namespace App\Console\Commands;

use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Console\Command;

class EqBalancesReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eq:balances';

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
        foreach (User::where('balance', '!=', '0')->get() as $user) {
            if ($user->balance > $user->max_balance) {
                $user->update(['max_balance' => $user->balance]);
            }
        }

        return 0;
    }
}
