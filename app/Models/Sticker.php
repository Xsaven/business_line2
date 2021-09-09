<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Sticker Class
 * @package App\Models
 */
class Sticker extends Model
{
    const TITLE = 'Стикеры';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'stickers';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'src',
        'active'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "src" => 'string',
        "active" => 'boolean'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "active" => true
    ];

}
