<?php

namespace App\Listeners\TaskSticker;

use App\Events\TaskSticker;
use App\Repositories\AuthUserRepository;
use App\Repositories\TaskReportRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Incrementing
{
    /**
     * Handle the event.
     *
     * @param  TaskSticker  $event
     * @return void
     */
    public function handle(TaskSticker $event)
    {
        if ($event->validated) {
            $event->task_report = app(TaskReportRepository::class)
                ->find($event->task_report_id);
            if ($event->task_report) {
                $event->attempted = (bool) $event->task_report->commentary()->create([
                    'text' => $event->message,
                    'fun_id' => \Auth::id(),
                    'active' => 1, //\Auth::user()->active_commentaries || config('free_chat'),
                ]);
            } else {
                $event->validated = false;
            }
        }
    }
}
