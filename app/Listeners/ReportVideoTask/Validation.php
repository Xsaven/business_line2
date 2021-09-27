<?php

namespace App\Listeners\ReportVideoTask;

use App\Events\ReportVideoTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportVideoTask  $event
     * @return void
     */
    public function handle(ReportVideoTask $event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->task && $event->file && str_starts_with($event->file, 'video/')) {
            $event->validated = true;
        }

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {
            $event->validated = false;
        }
    }
}
