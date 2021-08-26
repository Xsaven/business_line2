<?php

namespace App\Repositories;

use App\Models\User;
use Lar\Developer\CoreRepository;

/**
 * Class AuthUserRepository.
 * @package App\Repositories
 * @method User model()
 * @property-read User|\Illuminate\Contracts\Auth\Authenticatable|null $user
 * @property-read int $new_notifications_count
 */
class AuthUserRepository extends CoreRepository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\User::class;
    }

    /**
     * @return User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        return \Auth::user();
    }

    /**
     * @return int
     */
    public function new_notifications_count(): int
    {
        return $this->user ?
            $this->user->notifications()->whereNull('read_at')->count() : 0;
    }
}
