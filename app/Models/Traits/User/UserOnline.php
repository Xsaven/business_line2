<?php

namespace App\Models\Traits\User;

/**
 * UserOnline Trait.
 */
trait UserOnline
{
    /**
     * @return bool
     */
    public function online()
    {
        return \Cache::has("n:user:session:{$this->id}") && \Cache::get("n:user:session:{$this->id}");
    }
}
