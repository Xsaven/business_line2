<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PhotoValidate
{
    /**
     * Handle the event.
     *
     * @param  ReportPhotoTask  $event
     * @return void
     */
    public function handle(ReportPhotoTask $event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->task && $event->file && (str_ends_with($event->file, '.jpg') || str_ends_with($event->file, '.jpeg') || str_ends_with($event->file, '.png'))) {
            $event->validated = true;
        }

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {

            $event->validated = false;
        }
    }
}
