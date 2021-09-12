<?php

namespace App\Listeners\ReportTextTask;

use App\Events\ReportTextTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param ReportTextTask $event
     * @return void
     */
    public function handle(ReportTextTask $event)
    {
        if ($event->validated) {
            $event->taskReport = TaskReport::create([
                'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
                'comment' => $event->comment,
                'user_id' => \Auth::id(),
                'task_id' => $event->task_id,
            ]);
        }
    }
}
