<?php

namespace App\Repositories;

use App\Models\Direction;
use Bfg\Repository\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class DirectionRepository.
 * @package App\Repositories
 * @method Direction model()
 * @property-read Direction[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $all
 * @property-read Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null $findBySlug
 * @property-read Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null $findById
 */
class DirectionRepository extends Repository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Direction::class;
    }

    /**
     * @return Direction[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model()->take(3)->get();
    }

    /**
     * @param Request $request
     * @return Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function findBySlug(Request $request)
    {
        $slug = $request->direction;

        return Direction::whereSlug($slug)->with('tasks')->first();
    }

    /**
     * @param Request $request
     * @return Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function findById()
    {
        return Direction::first();
    }
}
