<?php

namespace App\Listeners\ReportImageVideoTask;

use App\Events\ReportImageVideoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportImageVideoTask  $event
     * @return void
     */
    public function handle(ReportImageVideoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $event->task->taskReports()->create([
                'status' => TaskReport::STATUS_UPLOADED,
                'files' => [$event->filename],
                'user_id' => $user_id,
            ]);
        }
    }
}
