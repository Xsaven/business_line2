<?php

namespace App\Listeners\ReportVideoTask;

use App\Events\ReportVideoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportVideoTask  $event
     * @return void
     */
    public function handle(ReportVideoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            TaskReport::create([
                'task_id' => $event->task_id,
                'status' => \Cache::has($event->file.'.status') ? TaskReport::STATUS_UPLOADED : TaskReport::STATUS_UPLOADING,
                'file' => $event->file,
                'user_id' => $user_id,
            ]);
        }
    }
}
