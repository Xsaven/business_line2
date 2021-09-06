<?php

namespace App\Listeners\ReportTextTask;

use App\Events\ReportTextTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportTextTask  $event
     * @return void
     */
    public function handle(ReportTextTask $event)
    {
        $user_id = \Auth::user()->id;


        TaskReport::create([
            'status' => TaskReport::STATUS_UPLOADED,
            'comment' => $event->comment,
            'user_id' => $user_id,
            'task_id' => $event->task_id,
        ]);
    }
}
