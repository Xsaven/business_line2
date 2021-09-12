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
            str_starts_with($value, 'https://') ? asset($value) : $value
        );
    }

    /**
     * Prepare the given value for storage.
     * @param TaskReport $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        if (\Cache::has($value)) {
            $data = \Cache::get($value);
            \Cache::forget($value);

            $value = $data;
        }

        if ($value) {
            $value = str_replace(\Storage::disk('yandexcloud')->url(''), '', $value);
        }

        return $value;
    }
}
