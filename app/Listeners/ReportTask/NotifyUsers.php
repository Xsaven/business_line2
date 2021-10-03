<?php

namespace App\Listeners\ReportTask;

use App\Events\AddUserBalance;
use App\Events\ReportPhotoTask;
use App\Events\ReportStarQuizTask;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\AdminApproveTaskReportNotification;
use App\Notifications\TaskReportForSubscribersNotification;
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
                $cost = $event->taskReport->cost ?: $event->taskReport->task->cost;
//                dd($event->taskReport, $cost);
                $event->taskReport->update([
                    'cost' => $cost,
                ]);
                event(
                    new AddUserBalance(
                        \Auth::id(), $cost, new UserSuccessCompleteTaskReport($event->task, $cost)
                    )
                );
            } elseif ($event->taskReport) {
                \Auth::user()
                    ->notify(
                        new UserSuccessUploadedTaskReport($event->task)
                    );
            }

            if ($event->taskReport) {
                \Auth::user()->logs()->create([
                    'field' => 'report',
                    'type' => 'upload',
                    'message' => 'Загрузил отчёт '.$event->taskReport->id,
                ]);
            }
        }
    }
}
