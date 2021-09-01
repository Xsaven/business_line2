<?php

namespace App\Repositories;

use App\Models\Commentary;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lar\Developer\CoreRepository;

/**
 * Class CommentaryRepository.
 * @package App\Repositories
 * @method Commentary model()
 * @property-read LengthAwarePaginator|Commentary[] $home_commentaries
 */
class CommentaryRepository extends CoreRepository
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
            ->paginate();
    }
}
