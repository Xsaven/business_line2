<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Direction Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Track[] $tracks
 * @property-read int|null $tracks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Direction extends Model
{
    const TITLE = 'Направления';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'directions';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];

    /**
     * The "hasMany" relation for "Treki".
     * @return HasMany
     */
    public function tracks() : HasMany
    {
        return $this->hasMany(Track::class, 'direction_id', 'id');
    }

    /**
     * The "hasMany" relation for "Polzovateli".
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'direction_id', 'id');
    }
}
