<?php

namespace App\Listeners\ReportFunTask;

use App\Events\ReportFunTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportFunTask  $event
     * @return void
     */
    public function handle(ReportFunTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            if ($event->is_video) {
                $status = \Cache::has($event->file.'.status') ?
                    ($event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED) :
                    TaskReport::STATUS_UPLOADING;
            } else {
                $status = $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED;
            }

            TaskReport::create([
                'task_id' => $event->task_id,
                'status' => $status,
                'comment' => $event->comment,
                'file' => $event->file,
                'user_id' => $user_id,
                'fun_id' => $event->fun_id ?: null,
            ]);
        }
    }
}
