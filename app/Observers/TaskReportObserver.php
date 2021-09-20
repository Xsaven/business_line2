<?php

namespace App\Observers;

use App\Events\AddUserBalance;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\DeleteTaskReportNotification;
use App\Notifications\TaskReportForSubscribersNotification;
use App\Notifications\UserFunForYouReportNotification;
use App\Notifications\UserNotedYouInTaskNotification;

class TaskReportObserver
{
    protected function notify_subscribers(TaskReport $taskReport)
    {
        $taskReport->user->subscribers->map(
            fn (User $user_s) => $user_s->notify(
                new TaskReportForSubscribersNotification($taskReport->user, $taskReport->task)
            )
        );

        if ($taskReport->fun_id) {

            $taskReport->fun->notify(
                new UserFunForYouReportNotification(
                    $taskReport->user, $taskReport->task
                )
            );
        }
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
            if (
                $taskReport->task->action_type !== Task::ACTION_TYPE_AUTO
            ) {
                $this->notify_subscribers($taskReport);
            }
        } else {
            Exec::dispatch($taskReport->user_id, "task-report-update-{$taskReport->id}");
        }
        AllAdminExec::dispatch(['questions:update']);
    }

    /**
     * @param  TaskReport  $taskReport
     */
    public function updating(TaskReport $taskReport)
    {
        if (
            $taskReport->status === TaskReport::STATUS_CHECKED &&
            $taskReport->comment &&
            $taskReport->task &&
            str_contains($taskReport->comment, '@')
        ) {
            $taskReport->comment = preg_replace_callback("/@([а-яА-Яa-zA-Z0-9_]+)/ui", function ($m) use ($taskReport) {
                if (isset($m[1])) {
                    $m[1] = explode("_", $m[1]);
                    $name = $m[1][0] ?? null;
                    $lastname = $m[1][1] ?? null;
                    $user = User::whereLogin($name)->first();
                    if (!$user) {
                        $user = User::whereName($name)->whereLastname($lastname)->first();
                    }
                    if ($user) {
                        $user->notify(
                            new UserNotedYouInTaskNotification($taskReport->user, $taskReport->task)
                        );
                        return "<a href='/user/{$user->id}'>{$user->full_name}</a>";
                    }
                }
                return $m[0];
            }, $taskReport->comment);
        }
    }

    /**
     * Handle the TaskReport "updated" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function updated(TaskReport $taskReport)
    {
        if (
            $taskReport->status === TaskReport::STATUS_CHECKED &&
            $taskReport->getRawOriginal('status') !== TaskReport::STATUS_CHECKED
        ) {
            AllUserExec::dispatch("task-report-update-{$taskReport->id}");
            if (
                $taskReport->task->action_type !== Task::ACTION_TYPE_AUTO
            ) {
                $this->notify_subscribers($taskReport);
            }
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
