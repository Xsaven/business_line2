<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class UserRepository.
 * @package App\Repositories
 * @method User model()
 * @property-read User|null $findBySlug
 * @property-read int $completeTaskCount
 * @property-read TaskReport $taskReports
 */
class UserRepository extends CoreRepository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\User::class;
    }

    /**
     * @param  Request  $request
     * @return User|null
     */
    public function findBySlug(Request $request)
    {
        $id = $request->user;

        return $id ? $this->model()->find($id) : null;
    }

    /**
     * @return int
     */
    public function completeTaskCount(): int
    {
        return $this->findBySlug->taskReports()
            ->where('status', TaskReport::STATUS_CHECKED)->count();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany[]
     */
    public function taskReports()
    {
        return $this->findBySlug->taskReports()
            ->where('status', TaskReport::STATUS_CHECKED)
            ->with('commentary')
            ->whereHas('task',function ($q) {
                return $q->where('action_type', '!=', Task::ACTION_TYPE_AUTO);
            })->withCount('likes')
            ->get();
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|mixed|null
     */
    public function find(int $id)
    {
        return $this->model()->find($id);
    }

    /**
     * @param string $q
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|\Illuminate\Support\Collection
     */
    public function search(string $q = '')
    {
        return $q ? $this->model()
            ->where('name', 'like', "%{$q}%")
            ->orWhere('lastname', 'like', "%{$q}%")
            ->get() : collect();
    }

    /**
     * @param string $q
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search_users_for_fans(string $q = '')
    {
        return $this->model()
            ->where(\DB::raw('CONCAT_WS(" ", name, lastname)'), 'like', "%{$q}%")
            ->orWhere('login', 'like', "%{$q}%")
            ->paginate(100);
    }
}
