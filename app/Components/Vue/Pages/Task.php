<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\QuizQuestionResource;
use App\Http\Resources\TaskReportResource;
use App\Http\Resources\TaskResource;
use App\Models\QuizQuestion;
use App\Models\TaskReport;
use App\Repositories\TaskRepository;
use Carbon\Carbon;

/**
 * Task Class.
 * @package App\Components\Vue\Pages
 */
class Task extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_task';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $user = \Auth::user();

        $repo = app(TaskRepository::class);

        if (! $repo->findById) {
            abort(404);
        } elseif (! $repo->findById->is_challenge && now() < Carbon::parse($repo->findById->start_at) && ! \App::isLocal()) {
            abort(404);
        }

        $attrs['task'] = TaskResource::make($repo->findById)->toArray(request());

        /** @var TaskReport $report */
        $report = $user->taskReports()->with('commentary')->withCount('likes')
            ->where('task_id', $attrs['task']['id'])->first();

        if ($report) {
            $attrs['task_report'] = TaskReportResource::make($report)->toArray(request());
            $attrs['reports'] = TaskReportResource::collection(
                $repo->findById
                    ->taskReports()
                    ->with('commentary')->withCount('likes')
                    ->where('status', TaskReport::STATUS_CHECKED)
                    ->where('id', '!=', $report->id)
                    ->get()
            )->toArray(request());
        } else {
            $attrs['task_report'] = null;
            $attrs['reports'] = [];
        }

        if ($repo->findById->report_type === 'quiz') {
            $attrs['quiz'] = QuizQuestionResource::collection(QuizQuestion::where('task_id', $repo->findById->id)->get())
                ->toArray(request());
        } else {
            $attrs['quiz'] = [];
        }

        if($repo->findById->report_type === 'star_quiz') {
            $attrs['star_quiz'] = QuizQuestionResource::collection(QuizQuestion::where('task_id',$repo->findById->id)->get())
                ->toArray(request());
        } else {
            $attrs['star_quiz'] = [];
        }

        parent::__construct($id, $attrs, $params);
    }
}
