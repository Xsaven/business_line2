<?php

namespace App\Listeners\ReportQuizTask;

use App\Events\ReportQuizTask;
use App\Models\QuizAnswer;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportQuizTask  $event
     * @return void
     */
    public function handle(ReportQuizTask $event)
    {
        $balls = 0;
        foreach (QuizAnswer::whereIn('id', array_values($event->quiz_answers))->get() as $answer) {
            $balls += $answer->cost;
        }

        $event->balls = $balls;

        \Auth::user()->increment('balance', $balls);

        TaskReport::create([
            'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
            'user_id' => \Auth::id(),
            'task_id' => $event->task->id,
        ]);
    }
}
