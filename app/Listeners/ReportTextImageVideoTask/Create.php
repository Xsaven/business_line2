<?php

namespace App\Listeners\ReportTextImageVideoTask;

use App\Events\ReportTextImageVideoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageVideoTask  $event
     * @return void
     */
    public function handle(ReportTextImageVideoTask $event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $event->task->taskReports()->create([
                'status' => TaskReport::STATUS_UPLOADED,
                'files' => [$event->filename],
                'comment' => $event->comment,
                'user_id' => $user_id,
            ]);
        }
    }
}
