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
//            $user = app(AuthUserRepository::class)
//                ->user;

//            $user->update([
//                'likes' => $user->commentaryLikes()->count() + $user->taskReportLikes()->count(),
//            ]);

            if ($event->task_report && $event->task_report->user->id !== \Auth::id()) {
                $state = (bool) app(AuthUserRepository::class)
                    ->user
                    ->taskReportLikes()->where('id', $event->task_report_id)->count();

                if ($state) {
                    $event->task_report->user->increment('likes');
                } else {
                    $event->task_report->user->decrement('likes');
                }
            }
        }
    }
}
