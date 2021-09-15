<?php

namespace App\Listeners\ReportFunTask;

use App\Events\ReportFunTask;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportFunTask  $event
     * @return void
     */
    public function handle(ReportFunTask $event)
    {
        $event->task = Task::find($event->task_id);
        $event->user = User::find($event->fun_id);

        if ($event->user && $event->task && $event->file && str_starts_with($event->file, 'video/')) {
            $event->validated = true;
            $event->is_video = true;
        }

        if ($event->user && $event->task && $event->file && (str_ends_with($event->file, '.jpg') || str_ends_with($event->file, '.jpeg') || str_ends_with($event->file, '.png'))) {
            $event->validated = true;
            $event->is_photo = true;
        }

        if (! $event->validated && $event->user && $event->task && ! $event->file) {
            $event->validated = true;
        }

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {

            $event->validated = false;
        }
    }
}
