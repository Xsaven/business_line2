<?php

namespace App\Listeners\TaskSticker;

use App\Events\TaskSticker;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use App\Notifications\UserLikeYouReportNotification;
use App\Notifications\UserStickerYouReportNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskSticker  $event
     * @return void
     */
    public function handle(TaskSticker $event)
    {
        if ($event->result() && $event->task_report) {
            AllUserExec::dispatch([
                "task-report-update-{$event->task_report_id}" => [],
            ]);

            Exec::updateUser(\Auth::id());

            $event->task_report->user->notify(
                new UserStickerYouReportNotification(\Auth::user(), $event->task_report->task)
            );
        }
    }
}
