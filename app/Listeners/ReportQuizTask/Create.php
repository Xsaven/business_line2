<?php

namespace App\Listeners\ReportQuizTask;

use App\Events\ReportQuizTask;
use App\Models\QuizAnswer;
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
        foreach ($event->quiz_answers as $k=>$quiz_answer) {
            $answer = QuizAnswer::whereId($quiz_answer)->first();

            if ($answer->quizQuestion->id === $k) {
                $balls = 0;
                $balls += $answer->cost;
            }
        }

        dd($balls);
    }
}
