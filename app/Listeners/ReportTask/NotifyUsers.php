<?php

namespace App\Listeners\ReportTask;

use App\Events\AddUserBalance;
use App\Events\ReportPhotoTask;
use App\Events\ReportStarQuizTask;
use App\Models\Task;
use App\Models\TaskReport;
use App\Notifications\AdminApproveTaskReportNotification;
use App\Notifications\UserSuccessCompleteTaskReport;
use App\Notifications\UserSuccessUploadedTaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  ReportStarQuizTask|ReportPhotoTask  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->validated) {
            if ($event->taskReport && $event->taskReport->status == TaskReport::STATUS_CHECKED) {
                event(
                    new AddUserBalance(
                        \Auth::id(), $event->taskReport->task->cost, new UserSuccessCompleteTaskReport($event->task)
                    )
                );
            } elseif ($event->taskReport) {
                \Auth::user()
                    ->notify(
                        new UserSuccessUploadedTaskReport($event->task)
                    );
            }
        }
    }
}
