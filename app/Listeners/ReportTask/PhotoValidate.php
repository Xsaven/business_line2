<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use App\Models\Task;
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

        //if ($event->file && (is_numeric($event->file) || str_ends_with($event->file, '.jpg'))) {
        if ($event->task && $event->file && str_ends_with($event->file, '.jpg')) {
            $event->validated = true;
        }
    }
}
