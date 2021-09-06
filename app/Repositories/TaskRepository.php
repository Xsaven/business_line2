<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class TaskRepository.
 * @package App\Repositories
 * @property-read Task|Task[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null $findById
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
     * @param  string  $q
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|\Illuminate\Support\Collection
     */
    public function search(string $q = '')
    {
        return $q ? $this->model()
            ->where('name', 'like', "%{$q}%")
            ->where('short_description', 'like', "%{$q}%")
            ->get() : collect();
    }
}
