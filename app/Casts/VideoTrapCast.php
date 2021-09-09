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
        return $value;
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
        return $value;
    }
}
