<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * CommentaryRoom Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentaries
 * @property-read int|null $commentaries_count
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommentaryRoom extends Model
{
    const TITLE = 'Комнаты комментариев';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'commentary_rooms';

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
     * The "morphMany" relation for "Kommentarii".
     * @return MorphMany
     */
    public function commentaries() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }
}
