<?php

namespace App\Models\Traits\User;

/**
 * UserAttributes Trait.
 * @package App\Models\Traits\User
 */
trait UserAttributes
{
    /**
     * @return string
     */
    public function getShortNameAttribute(): string
    {
        return mb_strtoupper(
            $this->lastname ? (mb_substr($this->name, 0, 1).mb_substr($this->lastname, 0,
                    1)) : mb_substr($this->name, 0, 2)
        );
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->name.' '.$this->lastname;
    }

    /**
     * @return mixed
     */
    public function getLikeRatingAttribute()
    {
        return \Cache::get("user_likes_position_{$this->id}", 0);
    }

    /**
     * @return mixed
     */
    public function getBalanceRatingAttribute()
    {
        return \Cache::get("user_balance_position_{$this->id}", 0);
    }
}
