<?php

namespace App\Console\Commands;

use App\Models\TaskReport;
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
        $balances = \App\Models\Ballance::whereIn('task_id', [11,29,35,42,61,69,39])->whereCost(50)->get();

        foreach ($balances as $balance) {
            /** @var TaskReport $report */
            $report = $balance->user->taskReports()
                ->where('task_id', $balance->task_id)
                ->where('cost', '!=', 50)
                ->first();

            dump($report);
        }

        return 0;
    }
}
