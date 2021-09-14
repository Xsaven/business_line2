<?php

namespace App\Listeners\ReportDownloadFileTask;

use App\Events\ReportDownloadFileTask;
use App\Models\TaskReport;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
{
    /**
     * Handle the event.
     *
     * @param  ReportDownloadFileTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileTask $event)
    {
        $event->task = $event->task_id ? app(TaskRepository::class)->find($event->task_id) : null;

        $event->validated = (bool) $event->task;

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {

            $event->validated = false;
        }
    }
}
