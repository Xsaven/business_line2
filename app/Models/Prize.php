<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Prize Class.
 *
 * @property int $id
 * @property string $name
 * @property string $src
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Track[] $tracks
 * @property-read int|null $tracks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Prize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prize query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prize whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prize whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prize extends Model
{
    const TITLE = 'Призы';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'prizes';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'src',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'src' => 'string',
    ];

    /**
     * The "belongsToMany" relation for "Treki".
     */
    public function tracks() : BelongsToMany
    {
        return $this->belongsToMany(Track::class, 'track_prizes', 'track_id', 'prize_id');
    }
}
