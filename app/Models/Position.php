<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Position Class.
 * @package App\Models
 */
class Position extends Model
{
    use HasFactory;

    const TITLE = 'Должности';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'positions';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * The "hasMany" relation for "Polzovateli".
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'position_id', 'id');
    }
}
