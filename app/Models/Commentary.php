<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Commentary\CommentaryLikeConfig;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Casts\StickersCast;

/**
 * Commentary Class
 * @package App\Models
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
        'fun_id'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "text" => StickersCast::class,
        "active" => 'boolean',
        "commentaryable_type" => 'string',
        "commentaryable_id" => 'integer',
        "fun_id" => 'integer'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "active" => 0
    ];

    /**
     * The "morphTo" relation for "Otcyoty' zadanii"
     * @return MorphTo
     */
    public function taskReport() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "morphTo" relation for "Komnaty' kommentariev"
     * @return MorphTo
     */
    public function commentaryRoom() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli"
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'fun_id');
    }

    /**
     * The "morphTo" relation for "Kommentarii"
     * @return MorphTo
     */
    public function commentary() : MorphTo
    {
        return $this->morphTo('commentaryable', 'commentaryable_type', 'commentaryable_id');
    }

    /**
     * The "morphMany" relation for "Kommentarii"
     * @return MorphMany
     */
    public function commentaries() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }

    /**
     * The "belongsToMany" relation for "Polzovateli"
     * @return BelongsToMany
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_commentaries', 'fun_id', 'commentary_id');
    }

}
