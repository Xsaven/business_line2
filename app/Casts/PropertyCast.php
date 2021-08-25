<?php

namespace App\Casts;

use App\Models\Setting;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Support\Arrayable;

/**
 * PropertyCast Class.
 */
class PropertyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param Setting $model
     * @param string $key
     * @param array $attributes
     */
    public function get($model, $key, $value, $attributes)
    {
        if ($value === 'true') {
            return true;
        } elseif ($value === 'false') {
            return false;
        } elseif ($value === 'null') {
            return null;
        } elseif (is_numeric($value) && $value == (int) $value) {
            return (int) $value;
        } elseif ($value && $j = is_json($value, true)) {
            return $j;
        }

        return $value;
    }

    /**
     * Prepare the given value for storage.
     * @param Setting $model
     * @param string $key
     * @param array $attributes
     */
    public function set($model, $key, $value, $attributes)
    {
        if ($value === true) {
            return 'true';
        } elseif ($value === false) {
            return 'false';
        } elseif ($value === null) {
            return 'null';
        } elseif (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_UNICODE);
        } elseif ($value instanceof Arrayable) {
            return json_encode($value->toArray());
        }

        return $value;
    }
}
