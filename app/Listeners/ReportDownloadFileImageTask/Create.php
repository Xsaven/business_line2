<?php

namespace App\Listeners\ReportDownloadFileImageTask;

use App\Events\ReportDownloadFileImageTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportDownloadFileImageTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileImageTask $event)
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
