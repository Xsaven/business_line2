<?php

namespace App\Models\Traits\Commentary;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * CommentaryLikeConfig Trait.
 * @package App\Models\Traits\Commentary
 */
trait CommentaryLikeConfig
{
    /**
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_commentaries', 'commentary_id', 'user_id');
    }
}
