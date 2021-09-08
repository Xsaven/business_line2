<?php

namespace App\Listeners\ReportTextVideoTask;

use App\Events\ReportTextVideoTask;
use App\Models\TaskReport;

class Create
{
    /**
     * @param ReportTextVideoTask $event
     */
    public function handle(ReportTextVideoTask $event)
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
