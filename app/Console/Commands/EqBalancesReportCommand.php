<?php

namespace App\Console\Commands;

use App\Models\Ballance;
use App\Models\Notification;
use App\Models\Order;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\UserMakeOrderNotification;
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
//        foreach (Order::all() as $user) {
//            if ($user->balance > $user->max_balance) {
//                $user->update(['max_balance' => $user->balance]);
//            }
//        }

        Order::whereNotNull('id')->delete();

        foreach (User::all() as $user) {
            $user->update([
                'balance' => $user->balance_rating
            ]);
        }

        Ballance::where('message', 'like', 'Покупка "%')->delete();
        Notification::where('type', UserMakeOrderNotification::class)->delete();

        return 0;
    }
}
