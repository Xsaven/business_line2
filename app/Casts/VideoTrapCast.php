<?php

namespace App\Casts;

use App\Models\TaskReport;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * VideoTrapCast Class.
 * @package App\Casts
 */
class VideoTrapCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param TaskReport $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return str_ends_with($value, '.jpg') ? \Storage::disk('yandexcloud')->url($value) : (
            str_starts_with($value, 'https://') ? $value : asset($value)
        );
    }
}
