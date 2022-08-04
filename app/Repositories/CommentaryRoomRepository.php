<?php

namespace App\Repositories;

use App\Models\CommentaryRoom;
use Bfg\Repository\Repository;

/**
 * Class CommentaryRoomRepository.
 * @package App\Repositories
 * @method CommentaryRoom model()
 * @property-read CommentaryRoom|\Illuminate\Database\Eloquent\Model|mixed|null $home
 */
class CommentaryRoomRepository extends Repository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\CommentaryRoom::class;
    }

    /**
     * @return CommentaryRoom|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function home()
    {
        return $this->model()->find(1);
    }
}
