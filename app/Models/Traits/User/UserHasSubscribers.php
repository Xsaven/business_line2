<?php

namespace App\Models\Traits\User;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * UserHasSubscribers Trait.
 */
trait UserHasSubscribers
{
    /**
     * The "belongsToMany" relation for "Polzovateli".
     */
    public function subscribers() : BelongsToMany
    {
        return $this->belongsToMany(self::class, 'user_subscriptions', 'subscription_id', 'user_id');
    }
}
