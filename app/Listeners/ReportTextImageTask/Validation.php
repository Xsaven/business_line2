<?php

namespace App\Listeners\ReportTextImageTask;

use App\Events\ReportTextImageTask;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageTask  $event
     * @return void
     */
    public function handle(ReportTextImageTask $event)
    {
        $event->task = $event->task_id ? app(TaskRepository::class)->find($event->task_id) : null;

        $event->validated = $event->task && ($event->comment && $event->file);
    }
}
