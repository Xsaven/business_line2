<?php

namespace App\Repositories;

use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class UserRepository.
 * @package App\Repositories
 * @property-read User|null $findBySlug
 * @property-read int $completeTaskCount
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
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|mixed|null
     */
    public function find(int $id)
    {
        return $this->model()->find($id);
    }
}