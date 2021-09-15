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

        $total = 0;

        foreach ($balances as $balance) {
            /** @var TaskReport $report */
            $report = $balance->user->taskReports()
                ->where('task_id', $balance->task_id)
                ->where('cost', '!=', 50)
                ->first();

            if ($report) {
                //dump($report->user_id);
                $min = $balance->cost-$report->cost;
                $new_balance = $balance->user->balance - $min;
                $balance->update(['cost' => $report->cost]);
                $balance->user->update(['balance' => $new_balance]);
                $this->comment("User ID - {$report->user_id}; Task ID - {$report->task_id}; Min - {$min}; New Balance - {$new_balance};");
                $total++;
            }
        }

        $this->info("Total: " . $total);

        return 0;
    }
}
