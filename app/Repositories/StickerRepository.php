<?php

namespace App\Repositories;

use App\Models\Sticker;
use Illuminate\Database\Eloquent\Collection;
use Lar\Developer\CoreRepository;

/**
 * Class StickerRepository.
 * @package App\Repositories
 * @method Sticker model()
 * @property-read Sticker|Sticker[]|Collection $active
 */
class StickerRepository extends CoreRepository
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
