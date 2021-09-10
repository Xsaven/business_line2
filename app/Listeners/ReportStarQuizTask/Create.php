<?php

namespace App\Listeners\ReportStarQuizTask;

use App\Events\ReportStarQuizTask;
use App\Models\QuizAnswer;
use App\Models\Star;
use App\Models\TaskReport;
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

        TaskReport::create([
            'status' => TaskReport::STATUS_CHECKED,
            'user_id' => \Auth::user()->id,
            'task_id' => $event->task->id,
        ]);
    }
}
