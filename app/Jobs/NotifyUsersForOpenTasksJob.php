<?php

namespace App\Jobs;

use App\Models\Direction;
use App\Models\Task;
use App\Notifications\YouHaveNewTaskNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUsersForOpenTasksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function handle()
    {
        $now = now()->setHour(0)->setMinute(0)->setSecond(0)->setMillisecond(0);
        foreach (Direction::all() as $direction) {
            $today_tasks = $direction->tasks()->whereDate('start_at', '>=', $now)
                ->whereDate('finish_at', '<=', $now)
                ->get();

            foreach ($today_tasks as $today_task) {
                if (!\Cache::has("notified_task_" . $today_task->id)) {
                    foreach ($direction->users as $user) {
                        $user->notify(
                            new YouHaveNewTaskNotification($today_task)
                        );
                    }
                    \Cache::set("notified_task_" . $today_task->id, 1, now()->addHours(26));
                }
            }
        }
    }
}
