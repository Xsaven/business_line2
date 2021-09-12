<?php

namespace App\Observers;

use App\Events\AddUserBalance;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Models\TaskReport;
use App\Notifications\DeleteTaskReportNotification;

class TaskReportObserver
{
    /**
     * Handle the TaskReport "created" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function created(TaskReport $taskReport)
    {
//        if ($taskReport->status === TaskReport::STATUS_CHECKED) {
//
//            event(new AddUserBalance($taskReport->user_id, $taskReport->task->cost, ""));
//        }
        AllAdminExec::dispatch(['questions:update']);
    }

    /**
     * Handle the TaskReport "updated" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function updated(TaskReport $taskReport)
    {
        AllUserExec::dispatch("task-report-update-{$taskReport->id}");
        AllAdminExec::dispatch(['questions:update']);
    }

    /**
     * Handle the TaskReport "deleted" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function deleted(TaskReport $taskReport)
    {
        if ($taskReport->status === TaskReport::STATUS_CHECKED) {

            event(
                new AddUserBalance(
                    $taskReport->user_id,
                    $taskReport->cost,
                    new DeleteTaskReportNotification(
                        $taskReport->task,
                        $taskReport->cost,
                    )
                )
            );
        }

        AllAdminExec::dispatch(['questions:update']);
    }

    /**
     * Handle the TaskReport "restored" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function restored(TaskReport $taskReport)
    {
        //
    }

    /**
     * Handle the TaskReport "force deleted" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function forceDeleted(TaskReport $taskReport)
    {
        //
    }
}
