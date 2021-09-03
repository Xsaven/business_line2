<?php

namespace App\Repositories;

use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Collection;
use Lar\Developer\CoreRepository;

/**
 * Class AuthUserRepository.
 * @package App\Repositories
 * @method User model()
 * @property-read User|\Illuminate\Contracts\Auth\Authenticatable|null $user
 * @property-read int $new_notifications_count
 * @property-read int $notifications_count
 * @property-read array $liked_comment_ids
 * @property-read \Illuminate\Database\Eloquent\Collection|Collection|DatabaseNotification[] $new_notifications
 * @property-read int $completeTaskCount
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

    /**
     * @return int
     */
    public function notifications_count(): int
    {
        return $this->user ?
            $this->user->notifications()->count() : 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Collection
     */
    public function new_notifications(): \Illuminate\Database\Eloquent\Collection|Collection
    {
        return $this->user ?
            $this->user->notifications()->whereNull('read_at')->get() : collect();
    }

    /**
     * @return bool
     */
    public function mark_as_read_notifications(): bool
    {
        return $this->user && (bool) $this->user->notifications()->whereNull('read_at')->update([
            'read_at' => now(),
        ]);
    }

    /**
     * @return array
     */
    public function liked_comment_ids(): array
    {
        return $this->user->commentaryLikes()->allRelatedIds()->toArray();
    }

    /**
     * @return int
     */
    public function completeTaskCount(): int
    {
        return $this->user->taskReports()
            ->where('status', TaskReport::STATUS_CHECKED)->count();
    }
}
