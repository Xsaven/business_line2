<?php

namespace App\Listeners\TaskSticker;

use App\Events\TaskSticker;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  TaskSticker  $event
     * @return void
     */
    public function handle(TaskSticker $event)
    {
        $event->validated = ! quick_validate(['id' => $event->task_report_id, 'm' => $event->message], [
                'id' => 'required|int|min:1|exists:task_reports,id',
                'm' => 'required|string|min:3',
            ]) && \Auth::check();
    }
}
