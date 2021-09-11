<?php

namespace App\Observers;

use App\Events\Ws\AllUserExec;
use App\Models\TaskReport;

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
        //
    }

    /**
     * Handle the TaskReport "updated" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function updated(TaskReport $taskReport)
    {
        //AllUserExec::dispatch("task-report-update-{$taskReport->id}");
    }

    /**
     * Handle the TaskReport "deleted" event.
     *
     * @param  \App\Models\TaskReport  $taskReport
     * @return void
     */
    public function deleted(TaskReport $taskReport)
    {
        //
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
