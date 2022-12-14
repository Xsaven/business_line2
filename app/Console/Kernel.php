<?php

namespace App\Console;

use App\Jobs\AdminStatisticJob;
use App\Jobs\CalculateBalanceTableJob;
use App\Jobs\DailyProductsJob;
use App\Jobs\NotifyUsersForOpenTasksJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('n_clear')->hourly();
        $schedule->job(AdminStatisticJob::class)->everyFiveMinutes();
        //$schedule->job(CalculateBalanceTableJob::class)->everyMinute();
        $schedule->job(NotifyUsersForOpenTasksJob::class)->dailyAt('00:01');
        $schedule->job(DailyProductsJob::class)->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
