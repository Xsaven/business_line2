<?php

namespace App\Casts;

use App\Models\Commentary;
use App\Models\Sticker;
use App\Repositories\StickerRepository;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * StickersCast Class.
 */
class StickersCast implements CastsAttributes
{
    /**
     * @var null
     */
    public static $ids = null;

    /**
     * Cast the given value.
     * @param Commentary $model
     * @param string $key
     * @param array $attributes
     */
    public function get($model, $key, $value, $attributes)
    {
        if (! static::$ids) {
            static::$ids = app(StickerRepository::class)
                ->active->mapWithKeys(function (Sticker $sticker) {
                    return [$sticker->id => "<img src='{$sticker->src}' alt=''>"];
                });
        }

        return tag_replace($value, static::$ids, '[*]');
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
