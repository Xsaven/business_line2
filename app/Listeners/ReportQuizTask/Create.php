<?php

namespace App\Listeners\ReportQuizTask;

use App\Events\ReportQuizTask;
use App\Models\QuizAnswer;
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

        \Auth::user()->update([
            'balance' => $balls,
        ]);

        TaskReport::create([
            'status' => TaskReport::STATUS_CHECKED,
            'user_id' => \Auth::user()->id,
            'task_id' => $event->task->id,
        ]);
    }
}
