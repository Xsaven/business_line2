<?php

namespace App\Listeners\ReportFunTask;

use App\Events\ReportFunTask;
use App\Models\Task;
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

        if ($event->user && $event->task && $event->file && str_starts_with($event->file, 'uploads/files') && $event->comment) {
            $event->validated = true;
            $event->is_video = true;
        }

        if ($event->user && $event->task && $event->file && str_ends_with($event->file, '.jpg') && $event->comment) {
            $event->validated = true;
            $event->is_photo = true;
        }

        if (!$event->validated && $event->comment && $event->user && $event->task && !$event->file) {
            $event->validated = true;
        }
    }
}
