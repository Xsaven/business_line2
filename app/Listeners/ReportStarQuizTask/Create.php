<?php

namespace App\Listeners\ReportStarQuizTask;

use App\Events\AddUserBalance;
use App\Events\ReportStarQuizTask;
use App\Models\QuizAnswer;
use App\Models\Star;
use App\Models\Task;
use App\Models\TaskReport;
use App\Notifications\UserSuccessUploadedStarQuizReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportStarQuizTask  $event
     * @return void
     */
    public function handle(ReportStarQuizTask $event)
    {
        $stars = [];

        foreach ($event->quiz_answers as $quiz_answer) {
            $answer = QuizAnswer::find($quiz_answer);
            $stars[] = $answer->stars->pluck('id')->toArray();
        }

        $result = collect($stars)->collapse()
            ->groupBy(fn ($i) => $i)
            ->map(fn (Collection $collection) => $collection->count())
            ->sortDesc()->keys()->first();

        $event->star = Star::find($result);

        $balls = 0;
        foreach (QuizAnswer::whereIn('id', array_values($event->quiz_answers))->get() as $answer) {
            $balls += $answer->cost;
        }

        $event->balls = $balls;

        event(
            new AddUserBalance(
                \Auth::id(), $balls, new UserSuccessUploadedStarQuizReport($balls, $event->task)
            )
        );

        TaskReport::create([
            'status' => $event->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED,
            'user_id' => \Auth::user()->id,
            'task_id' => $event->task->id,
            'cost' => $balls
        ]);
    }
}
