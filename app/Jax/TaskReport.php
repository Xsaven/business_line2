<?php

namespace App\Jax;

use App\Events\TaskLike;
use App\Http\Resources\TaskReportResource;
use App\Repositories\AuthUserRepository;
use App\Repositories\TaskReportRepository;
use Lar\LJS\JaxExecutor;

/**
 * TaskReport Class.
 * @package App\Jax
 */
class TaskReport extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @param  int  $id
     * @return TaskReportResource|null
     */
    public function find(int $id)
    {
        $model = app(TaskReportRepository::class)->find($id);

        return $model ? TaskReportResource::make($model) : null;
    }

    /**
     * @param  int  $id
     * @return array
     */
    public function like(int $id)
    {
        $event = new TaskLike($id);

        event($event);

        return [
            'result' => $event->result(),
            'liked_task_report_ids' => app(AuthUserRepository::class)->liked_task_report_ids,
            'report' => $event->task_report ?
                TaskReportResource::make($event->task_report) : null,
        ];
    }

    public function comment(int $id, string $message)
    {
        $event = new TaskLike($message, $parent_id);

        event($event);

        return [
            'result' => $event->result(),
            'comment' => $event->commentary ?
                CommentaryResource::make($event->commentary) : null,
        ];
    }
}
