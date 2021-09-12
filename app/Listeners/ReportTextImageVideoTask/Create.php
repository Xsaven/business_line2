<?php

namespace App\Listeners\ReportTextImageVideoTask;

use App\Events\ReportTextImageVideoTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageVideoTask  $event
     * @return void
     */
    public function handle(ReportTextImageVideoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $event->taskReport = TaskReport::create([
                'task_id' => $event->task_id,
                'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
                'file' => $event->file,
                'comment' => $event->comment,
                'user_id' => $user_id,
            ]);
        }
    }
}
