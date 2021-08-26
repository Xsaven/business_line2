<?php

namespace App\Models;

use App\Casts\StickersCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Commentary Class.
 *
 * @package App\Models
 * @property int $id
 * @property $text
 * @property int $likes
 * @property bool $active
 * @property string $commentaryable_type
 * @property int $commentaryable_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Commentary[] $commentaries
 * @property-read int|null $commentaries_count
 * @property-read Model|\Eloquent $commentary
 * @property-read Model|\Eloquent $taskReport
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCommentaryableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCommentaryableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereUserId($value)
 * @mixin \Eloquent
 */
class Commentary extends Model
{
    const TITLE = 'Комментарии';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'commentaries';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'text',
        'likes',
        'active',
        'commentaryable_type',
        'commentaryable_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'text' => StickersCast::class,
        'likes' => 'integer',
        'active' => 'boolean',
        'commentaryable_type' => 'string',
        'commentaryable_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'likes' => 0,
        'active' => 0,
    ];

    /**
     * The "morphTo" relation for "Otcyoty' zadanii".
     * @return MorphTo
     */
    public function taskReport() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * The "morphTo" relation for "Kommentarii".
     * @return MorphTo
     */
    public function commentary() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "morphMany" relation for "Kommentarii".
     * @return MorphMany
     */
    public function commentaries() : MorphMany
    {
        return $this->morphMany(self::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }
}
