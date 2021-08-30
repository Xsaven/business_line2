<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\PrizeResource;
use App\Models\Prize;
use App\Models\Task;
use App\Repositories\DirectionRepository;
use Carbon\Carbon;

/**
 * Direction Class.
 * @package App\Components\Vue\Pages
 */
class Direction extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_direction';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $repo = app(DirectionRepository::class);

        if (!$repo->findBySlug) {
            abort(404);
        }

        $attrs['direction'] = $repo->findBySlug->toArray(request());
        $attrs['prizes'] = PrizeResource::collection(Prize::all())->toArray(request());
        $attrs['dates'] = diff_day_chunk($repo->findBySlug->start_at, $repo->findBySlug->end_at);
        $attrs['tasks'] = [];

        $attrs['tasks_calendar'] = [];


        foreach ($repo->findBySlug->tasks as $task) {

            if ($task->start_at && $task->finish_at) {

                $diff_days = $task->start_at->diffInDays($task->finish_at);
                $attrs['tasks_calendar'][$task->start_at->toDateString()][] = $task;
                for ($i=1; $i<=$diff_days;$i++) {
                    $attrs['tasks_calendar'][$task->start_at->addDays($i)->toDateString()][] = $task;
                }
            }
        }

        $attrs['tasks_calendar'] = collect($attrs['tasks_calendar'])->map(function ($list) {
            return collect($list)->map(function (Task $task) {
//            return array_pad($list, 7, 0);
                return ['id' => $task->id, 'width' => $task->start_at->diffInDays($task->finish_at)];
            })->toArray();
        })->toArray();

        $attrs['tasks_calendar'] = array_chunk($attrs['tasks_calendar'], 7, 1);

        //dd($attrs['tasks_calendar']);

        parent::__construct($id, $attrs, $params);
    }
}
