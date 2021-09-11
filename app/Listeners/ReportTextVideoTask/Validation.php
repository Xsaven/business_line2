<?php

namespace App\Listeners\ReportTextVideoTask;

use App\Events\ReportTextVideoTask;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportTextVideoTask  $event
     * @return void
     */
    public function handle(ReportTextVideoTask $event)
    {
        $event->task = $event->task_id ? app(TaskRepository::class)->find($event->task_id) : null;

        $event->validated = $event->task && ($event->comment && $event->file);
    }
}
