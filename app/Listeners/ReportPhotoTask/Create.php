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

            TaskReport::create([
                'task_id' => $event->task_id,
                //'status' => \Cache::has($event->file) ? TaskReport::STATUS_UPLOADED : TaskReport::STATUS_UPLOADING,
                'status' => TaskReport::STATUS_UPLOADED,
                'file' => $event->file,
                'user_id' => $user_id,
            ]);
        }
    }
}
