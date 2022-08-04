<?php

namespace App\Repositories;

use App\Models\Sticker;
use Bfg\Repository\Repository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StickerRepository.
 * @package App\Repositories
 * @method Sticker model()
 * @property-read Sticker|Sticker[]|Collection $active
 */
class StickerRepository extends Repository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Sticker::class;
    }

    /**
     * @return Sticker[]|\Illuminate\Database\Eloquent\Builder[]|Collection|\Illuminate\Support\Collection
     */
    public function active()
    {
        return $this->model()->where('active', 1)->get();
    }
}
