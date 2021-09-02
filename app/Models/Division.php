<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Division Class.
 * @package App\Models
 */
class Division extends Model
{
    use HasFactory;

    const TITLE = 'Подразделения';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'divisions';

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
        return $this->hasMany(User::class, 'division_id', 'id');
    }
}
