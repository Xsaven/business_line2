<?php

namespace App\Listeners\ReportTextVideoTask;

use App\Events\ReportTextVideoTask;
use App\Models\Task;
use App\Models\TaskReport;

class Create
{
    /**
     * @param ReportTextVideoTask $event
     */
    public function handle(ReportTextVideoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            TaskReport::create([
                'task_id' => $event->task_id,
                'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
                'file' => $event->file,
                'user_id' => $user_id,
            ]);
        }
    }
}
