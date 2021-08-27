<?php

namespace App\Models\Traits\User;

/**
 * UserAttributes Trait.
 * @package App\Models\Traits\User
 */
trait UserAttributes
{
    /**
     * @return array|false|string|string[]|null
     */
    public function getShortNameAttribute()
    {
        return mb_strtoupper(
            $this->lastname ? (mb_substr($this->name, 0, 1).mb_substr($this->lastname, 0,
                    1)) : mb_substr($this->name, 0, 2)
        );
    }
}
