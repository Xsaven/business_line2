<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\PropertyCast;

/**
 * Setting Class
 * @package App\Models
 */
class Setting extends Model
{
    const TITLE = 'Настройки';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'value',
        'field',
        'info'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "value" => PropertyCast::class,
        "field" => 'string',
        "info" => 'string'
    ];

}
