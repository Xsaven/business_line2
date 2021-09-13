<?php

namespace App\Observers;

use App\Events\AddUserBalance;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\DeleteTaskReportNotification;
use App\Notifications\TaskReportForSubscribersNotification;

class TaskReportObserver
{
    protected function notify_subscribers(TaskReport $taskReport)
    {
        $taskReport->user->subscribers->map(
            fn (User $user_s) => $user_s->notify(
                new TaskReportForSubscribersNotification($taskReport->user, $taskReport->task)
            )
        );
    }

    /**
     * Handle the TaskReport "created" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function created(TaskReport $taskReport)
    {
        if ($taskReport->status === TaskReport::STATUS_CHECKED) {
            AllUserExec::dispatch("task-report-update-{$taskReport->id}");
            $this->notify_subscribers($taskReport);
        } else {
            Exec::dispatch($taskReport->user_id, "task-report-update-{$taskReport->id}");
        }
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
//        info($taskReport->id . " : " . $taskReport->status);

        if ($taskReport->status === TaskReport::STATUS_CHECKED) {
            AllUserExec::dispatch("task-report-update-{$taskReport->id}");
            $this->notify_subscribers($taskReport);
        } else {
            Exec::dispatch($taskReport->user_id, "task-report-update-{$taskReport->id}");
        }
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

            if ($taskReport->cost) event(
                new AddUserBalance(
                    $taskReport->user_id,
                    -$taskReport->cost,
                    new DeleteTaskReportNotification(
                        $taskReport->task,
                        -$taskReport->cost,
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
