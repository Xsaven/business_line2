<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        if ($event->result() && $event->task_report) {
            Exec::dispatch(\Auth::id(), [
                //"task-report-update-{$event->task_report_id}" => [],
                'update' => [],
            ]);
        }
    }
}
