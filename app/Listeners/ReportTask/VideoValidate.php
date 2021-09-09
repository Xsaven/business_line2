<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportVideoTask;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoValidate
{
    /**
     * Handle the event.
     *
     * @param  ReportVideoTask  $event
     * @return void
     */
    public function handle(ReportVideoTask $event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->task && $event->file && str_starts_with($event->file, "uploads/files")) {

            $event->validated = true;
        }
    }
}
