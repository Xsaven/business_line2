<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use App\Repositories\AuthUserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        if ($event->result()) {
            $user = app(AuthUserRepository::class)
                ->user;

            $user->update([
                'likes' => $user->commentaryLikes()->count() + $user->taskReportLikes()->count(),
            ]);
        }
    }
}
