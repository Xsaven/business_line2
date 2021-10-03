<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
use App\Jobs\CalculateLikesTableJob;
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
            if ($event->task_report && $event->task_report->user->id !== \Auth::id()) {
                $event->task_report->user->likes =
                    $event->task_report->user->taskReports()->withCount('likes')->get()->sum('likes_count');
                $event->task_report->user->save();

                \Auth::user()->logs()->create([
                    'field' => 'like',
                    'type' => 'like',
                    'message' => 'Поставил лайк отчёту '.$event->task_report->id,
                ]);
            }

            if ($event->task_report) {
                CalculateLikesTableJob::dispatch();
            }
        }
    }
}
