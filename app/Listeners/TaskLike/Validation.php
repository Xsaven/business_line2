<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        $event->validated = ! quick_validate(['id' => $event->task_report_id], [
                'id' => 'required|int|min:1|exists:task_reports,id',
            ]) && \Auth::check();
    }
}
