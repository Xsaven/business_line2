<?php

namespace App\Listeners\ReportTextImageVideoTask;

use App\Events\ReportTextImageVideoTask;
use App\Models\TaskReport;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageVideoTask  $event
     * @return void
     */
    public function handle(ReportTextImageVideoTask $event)
    {
        $event->task = $event->task_id ? app(TaskRepository::class)->find($event->task_id) : null;

        $event->validated = $event->task && ($event->comment || $event->file);

        if (TaskReport::whereUserId(\Auth::id())->whereTaskId($event->task_id)->exists()) {
            $event->validated = false;
        }
    }
}
