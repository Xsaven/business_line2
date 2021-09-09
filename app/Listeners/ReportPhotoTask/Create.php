<?php

namespace App\Listeners\ReportPhotoTask;

use App\Events\ReportPhotoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportPhotoTask  $event
     * @return void
     */
    public function handle(ReportPhotoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $event->task->taskReports()->create([
                'status' => TaskReport::STATUS_UPLOADED,
                'files' => $event->file,
                'user_id' => $user_id,
            ]);
        }
    }
}
