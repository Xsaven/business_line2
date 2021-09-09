<?php

namespace App\Models;

use App\Casts\StickersCast;
use App\Models\Traits\Commentary\CommentaryLikeConfig;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Commentary Class.
 *
 * @package App\Models
 * @property int $id
 * @property $text
 * @property bool $active
 * @property string $commentaryable_type
 * @property int $commentaryable_id
 * @property int $fun_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Commentary[] $commentaries
 * @property-read int|null $commentaries_count
 * @property-read Model|\Eloquent $commentary
 * @property-read Model|\Eloquent $commentaryRoom
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likes
 * @property-read int|null $likes_count
 * @property-read Model|\Eloquent $taskReport
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCommentaryableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCommentaryableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereFunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Commentary extends Model
{
    use CommentaryLikeConfig;

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
        'active',
        'commentaryable_type',
        'commentaryable_id',
        'fun_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'text' => StickersCast::class,
        'active' => 'boolean',
        'commentaryable_type' => 'string',
        'commentaryable_id' => 'integer',
        'fun_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
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
     * The "morphTo" relation for "Komnaty' kommentariev".
     * @return MorphTo
     */
    public function commentaryRoom() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'fun_id');
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

    /**
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_commentaries', 'fun_id', 'commentary_id');
    }
}
