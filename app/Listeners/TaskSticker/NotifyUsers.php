<?php

namespace App\Listeners\TaskSticker;

use App\Events\TaskSticker;
use App\Events\Ws\AllUserExec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskSticker  $event
     * @return void
     */
    public function handle(TaskSticker $event)
    {
        if ($event->result() && $event->task_report) {
            AllUserExec::dispatch([
                "task-report-update-{$event->task_report_id}" => [],
                'update' => [],
            ]);
        }
    }
}
