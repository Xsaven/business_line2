<?php

namespace App\Jax;

use App\Events\TaskLike;
use App\Events\TaskSticker;
use App\Http\Resources\TaskReportResource;
use App\Models\Task;
use App\Repositories\AuthUserRepository;
use App\Repositories\TaskReportRepository;
use App\Repositories\TaskRepository;
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

    /**
     * @param  int  $id
     * @param  string  $message
     * @return array
     */
    public function comment(int $id, string $message)
    {
        $event = new TaskSticker($id, $message);

        event($event);

        return [
            'result' => $event->result(),
            'report' => $event->task_report ?
                TaskReportResource::make(app(TaskReportRepository::class)
                    ->find($event->task_report_id)) : null,
        ];
    }

    /**
     * @param  int  $task_id
     * @param  string  $type
     * @return TaskReport|array|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Lar\Layout\Respond
     */
    public function pagination(int $task_id, string $type = "date")
    {
        $repo = app(TaskRepository::class);

        $task = Task::find($task_id);

        $auth = app(AuthUserRepository::class);

        $report = $auth->user->taskReports()->where('task_id', $task_id)->first();

        return $task ? TaskReportResource::collection(
            $repo->reports_in_task($report, $task, $type)
        ) : [];
    }
}
