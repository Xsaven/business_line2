<?php

namespace App\Casts;

use App\Models\Commentary;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * StickersCast Class.
 */
class StickersCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param Commentary $model
     * @param string $key
     * @param array $attributes
     */
    public function get($model, $key, $value, $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     * @param Commentary $model
     * @param string $key
     * @param array $attributes
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}
