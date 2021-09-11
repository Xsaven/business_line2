<?php

namespace App\Listeners\ReportImageVideoTask;

use App\Events\ReportImageVideoTask;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportImageVideoTask  $event
     * @return void
     */
    public function handle(ReportImageVideoTask $event)
    {
        $event->task = $event->task_id ? app(TaskRepository::class)->find($event->task_id) : null;

        $event->validated = $event->task && $event->file;
    }
}
