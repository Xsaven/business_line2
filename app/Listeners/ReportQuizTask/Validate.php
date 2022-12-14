<?php

namespace App\Listeners\ReportQuizTask;

use App\Events\ReportQuizTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
{
    /**
     * Handle the event.
     *
     * @param  ReportQuizTask  $event
     * @return void
     */
    public function handle(ReportQuizTask $event)
    {
        $event->task = Task::find($event->task_id);
        $event->validated = (bool) $event->task && count(array_values($event->quiz_answers));

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {
            $event->validated = false;
        }
    }
}
