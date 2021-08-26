<?php

namespace App\Repositories;

use App\Models\Direction;
use Illuminate\Database\Eloquent\Model;
use Lar\Developer\CoreRepository;

/**
 * Class DirectionRepository.
 * @package App\Repositories
 * @method Direction model()
 * @property-read Direction[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $all
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
        return $this->model()->get();
    }
}
