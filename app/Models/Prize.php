<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Prize Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $src
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Direction[] $directions
 * @property-read int|null $directions_count
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
     * The "belongsToMany" relation for "Napravleniya".
     * @return BelongsToMany
     */
    public function directions() : BelongsToMany
    {
        return $this->belongsToMany(Direction::class, 'direction_prizes', 'direction_id', 'prize_id');
    }
}
