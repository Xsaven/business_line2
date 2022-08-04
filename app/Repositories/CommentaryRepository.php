<?php

namespace App\Repositories;

use App\Models\Commentary;
use Bfg\Repository\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CommentaryRepository.
 * @package App\Repositories
 * @method Commentary model()
 * @property-read LengthAwarePaginator|Commentary[] $home_commentaries
 */
class CommentaryRepository extends Repository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Commentary::class;
    }

    /**
     * @return LengthAwarePaginator|Commentary[]
     */
    public function home_commentaries()
    {
        return app(CommentaryRoomRepository::class)
            ->home
            ->commentaries()
            ->with('user', 'commentaries')
            ->withCount('likes')
            ->orderByDesc('id')
            ->where('active', 1)
            ->paginate(100);
    }

    /**
     * @param  int  $id
     * @return Commentary|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function find(int $id)
    {
        return $this->model()
            ->with('user', 'commentaries')
            ->withCount('likes')
            ->where('active', 1)
            ->find($id);
    }

    /**
     * @param  int  $parent_id
     * @return Commentary[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function child(int $parent_id)
    {
        return $this->find($parent_id)->commentaries;
    }
}
