<?php

namespace App\Repositories;

use App\Models\Setting;
use Lar\Developer\CoreRepository;

/**
 * Class SettingRepository.
 * @package App\Repositories
 * @method Setting model()
 * @property-read Setting[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $all
 */
class SettingRepository extends CoreRepository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Setting::class;
    }

    /**
     * @return Setting[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model()->get();
    }
}
