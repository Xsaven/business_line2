<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class TaskRepository.
 * @package App\Repositories
 * @property-read Task|Task[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null $findById
 * @property-read TaskReport|null $user_task_report
 */
class TaskRepository extends CoreRepository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Task::class;
    }

    /**
     * @param Request $request
     * @return Task|Task[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function findById(Request $request)
    {
        $id = $request->task;

        return Task::find($id);
    }

    /**
     * @param  int  $id
     * @return Task|Task[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function find(int $id)
    {
        return Task::find($id);
    }

    /**
     * @param  string  $q
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|\Illuminate\Support\Collection
     */
    public function search(string $q = '')
    {
        return $q ? $this->model()
            ->where('name', 'like', "%{$q}%")
            ->orWhere('short_description', 'like', "%{$q}%")
            ->get() : collect();
    }

    /**
     * @param  TaskReport  $report
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function reports_in_task(TaskReport $report)
    {
        return $this->findById
            ->taskReports()
            ->with('commentary')->withCount('likes')
            ->where('status', TaskReport::STATUS_CHECKED)
            ->where('id', '!=', $report->id)
            ->get();
    }

    /**
     * @return TaskReport|null
     */
    public function user_task_report()
    {
        $user = \Auth::user();
        /** @var TaskReport $result */
        $result = app(AuthUserRepository::class)->user
            ->taskReports()
            ->with('commentary')
            ->withCount('likes')
            ->where('task_id', $this->findById->id)
            ->first();

        return $result;
    }
}
