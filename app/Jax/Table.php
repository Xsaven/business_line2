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
                ->distinct('id')
                ->where('direction_id', $direction_id)
                ->whereActive(1)
                ->withCount('taskReports')
                ->orderByDesc($sort == 'balance' ? 'max_balance' : $sort)
                ->orderBy('name', 'ASC')
                ->orderBy('lastname', 'ASC')
                ->paginate(10)
        );
    }
}
