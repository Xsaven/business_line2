<?php

namespace App\Repositories;

use App\Models\Direction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class DirectionRepository.
 * @package App\Repositories
 * @method Direction model()
 * @property-read Direction[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $all
 * @property-read Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null $findBySlug
 * @property-read Direction|\Illuminate\Database\Eloquent\Builder|Model|object|null $findById
 */
class DirectionRepository extends CoreRepository
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
    public function findById(Request $request)
    {
        $slug = $request->direction;

        return Direction::whereId($slug)->first();
    }
}
