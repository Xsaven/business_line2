<?php

namespace App\Jax;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Lar\LJS\JaxExecutor;

/**
 * Table Class.
 * @package App\Jax
 */
class Table extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @param  int  $direction_id
     * @param  string  $sort
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function pagination(int $direction_id, string $sort = 'balance'): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserResource::collection(
            app(UserRepository::class)
                ->model()
                ->where('direction_id', $direction_id)
                ->withCount('taskReports')
                ->orderByDesc($sort)
                ->paginate(10)
        );
    }
}
