<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use App\Repositories\AuthUserRepository;
use App\Repositories\CommentaryRepository;
use App\Repositories\TaskReportRepository;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Incrementing
{
    /**
     * Handle the event.
     *
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        if ($event->validated) {
            $event->attempted = (bool) app(AuthUserRepository::class)
                ->user
                ->taskReportLikes()
                ->toggle([$event->task_report_id]);

            $event->task_report = app(TaskReportRepository::class)
                ->find($event->task_report_id);
        }
    }
}
