<?php

namespace App\Models\Traits\User;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * UserHasSubscribers Trait.
 */
trait UserHasSubscribers
{
    /**
     * Подписчики
     * The "belongsToMany" relation for "Polzovateli".
     */
    public function subscribers() : BelongsToMany
    {
        return $this->belongsToMany(self::class, 'user_subscriptions', 'subscription_id', 'user_id');
    }

    /**
     * Подписки
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function subscriptions() : BelongsToMany
    {
        return $this->belongsToMany(self::class, 'user_subscriptions', 'user_id', 'subscription_id');
    }
}
