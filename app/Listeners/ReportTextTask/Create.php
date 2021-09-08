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
        $user_id = \Auth::user()->id;

        $task = Task::find($event->task_id);

        if (! $task->fans_task) {
            if ($event->validated) {
                TaskReport::create([
                    'status' => TaskReport::STATUS_UPLOADED,
                    'comment' => $event->comment,
                    'user_id' => $user_id,
                    'task_id' => $event->task_id,
                ]);
            }
        } else {
            if ($event->validated) {
                TaskReport::create([
                    'status' => TaskReport::STATUS_UPLOADED,
                    'comment' => $event->comment,
                    'user_id' => $user_id,
                    'task_id' => $event->task_id,
                    'fun_id' => $event->fun_id,
                ]);
            }
        }
    }
}
