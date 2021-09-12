<?php

namespace App\LteAdmin\Jax;

use App\Events\AddUserBalance;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\TaskReportResource;
use App\Models\Question;
use App\Models\TaskReport;
use App\Notifications\AdminApproveTaskReportNotification;
use App\Notifications\AdminDropTaskReportNotification;
use App\Repositories\QuestionRepository;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * QuestionsControl Class.
 */
class QuestionsControl extends LteAdminExecutor
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list_for_approve()
    {
//        return QuestionResource::collection(
//            $repository->model()->where('active', 0)->orderByDesc('id')->get()
//        );
        return TaskReportResource::collection(
            TaskReport::whereStatus(TaskReport::STATUS_UPLOADED)->get()
        );
    }

    public function approve(int $id)
    {
        $taskReport = TaskReport::find($id);

        if ($taskReport && $taskReport->update(['status' => TaskReport::STATUS_CHECKED])) {
            event(
                new AddUserBalance(
                    $taskReport->user_id, $taskReport->task->cost, new AdminApproveTaskReportNotification($taskReport->task)
                )
            );
            AllUserExec::dispatch("task-report-update-{$taskReport->id}");
            AllAdminExec::dispatch(['questions:update']);
        }
    }

    public function drop(int $id)
    {
        $taskReport = TaskReport::find($id);

        if ($taskReport && $taskReport->update(['status' => TaskReport::STATUS_CANCELED])) {
            $taskReport->user->notify(new AdminDropTaskReportNotification($taskReport->task));
            AllUserExec::dispatch("task-report-update-{$taskReport->id}");
            AllAdminExec::dispatch(['questions:update']);
        }
    }
}
