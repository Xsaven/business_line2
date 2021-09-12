<?php

namespace App\Listeners\ReportDownloadFileTask;

use App\Events\ReportDownloadFileTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportDownloadFileTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $event->taskReport = TaskReport::create([
                'task_id' => $event->task_id,
                'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
                'user_id' => $user_id,
            ]);
        }
    }
}
