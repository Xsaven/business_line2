<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Sticker Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $src
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sticker whereUpdatedAt($value)
 * @mixin \Eloquent
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
        'active',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'src' => 'string',
        'active' => 'boolean',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'active' => true,
    ];
}
