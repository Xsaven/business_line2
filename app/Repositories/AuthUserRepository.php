<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Pagination\LengthAwarePaginator;
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
 * @property-read array $liked_task_report_ids
 * @property-read \Illuminate\Database\Eloquent\Collection|Collection|DatabaseNotification[] $new_notifications
 * @property-read int $completeTaskCount
 * @property-read array $subscribesUsers
 * @property-read TaskReport[] $userTaskReports
 * @property-read TaskReport[] $userCompleteTaskReports
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
     * @return LengthAwarePaginator|Collection
     */
    public function new_notifications(): LengthAwarePaginator|Collection
    {
        return $this->user ?
            $this->user->notifications()->paginate(30) : collect();
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
     * @return array
     */
    public function liked_task_report_ids(): array
    {
        return $this->user->taskReportLikes()->allRelatedIds()->toArray();
    }

    /**
     * @return int
     */
    public function completeTaskCount(): int
    {
        return $this->user->taskReports()
            ->where('status', TaskReport::STATUS_CHECKED)
            ->whereHas('task', function ($q) {
                return $q->where('action_type', '!=', Task::ACTION_TYPE_AUTO);
            })
            ->count();
    }

    /**
     * @return array
     */
    public function subscribesUsers(): array
    {
        return $this->user->subscriptions()->allRelatedIds()->toArray();
    }

    /**
     * @return TaskReport[]|\Illuminate\Database\Eloquent\Collection
     */
    public function userTaskReports()
    {
        $user = \Auth::user();
        /** @var TaskReport $result */
        return $this->user->taskReports()
            ->with('commentary')
            ->whereHas('task', function ($q) {
                return $q->where('action_type', '!=', Task::ACTION_TYPE_AUTO);
            })->withCount('likes')
            ->get();
    }

    /**
     * @return TaskReport[]|\Illuminate\Database\Eloquent\Collection
     */
    public function userCompleteTaskReports()
    {
        $user = \Auth::user();
        /** @var TaskReport $result */
        return $this->user->taskReports()
            ->with('commentary')
            ->where('status', TaskReport::STATUS_CHECKED)
            ->whereHas('task', function ($q) {
                return $q->where('action_type', '!=', Task::ACTION_TYPE_AUTO);
            })->withCount('likes')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function myOrders()
    {
        return $this->user->orders()->get();
    }
}
