<?php

namespace App\Listeners\ReportDownloadFileImageTask;

use App\Events\ReportDownloadFileImageTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
{
    /**
     * Handle the event.
     *
     * @param  ReportDownloadFileImageTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileImageTask $event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->task && $event->file && str_ends_with($event->file, '.jpg')) {
            $event->validated = true;
        }

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {

            $event->validated = false;
        }
    }
}
