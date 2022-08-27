<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use App\Notifications\UserLikeYouReportNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        if ($event->result() && $event->task_report) {
            if (false) {
                Exec::dispatch(\Auth::id(), [
                    //"task-report-update-{$event->task_report_id}" => [],
                    'update' => [],
                ]);
            }

            $event->task_report->user->notify(
                new UserLikeYouReportNotification(\Auth::user(), $event->task_report->task)
            );
        }
    }
}
