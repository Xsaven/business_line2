<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\QuizQuestionResource;
use App\Http\Resources\TaskReportResource;
use App\Http\Resources\TaskResource;
use App\Models\QuizQuestion;
use App\Models\TaskReport;
use App\Repositories\AuthUserRepository;
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

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $auth = app(AuthUserRepository::class);

        $repo = app(TaskRepository::class);

        $this->abort($repo);

        $report = $repo->user_task_report;

        /**
         * Attributes.
         */
        $attrs['task'] = TaskResource::make($repo->findById);

        $attrs['task_report'] = $report ? TaskReportResource::make($report) : null;

        $attrs['reports'] = TaskReportResource::collection(
            $repo->reports_in_task($report)
        );

        $attrs['quiz'] = $repo->findById->report_type === 'quiz' ? QuizQuestionResource::collection(
            QuizQuestion::where('task_id', $repo->findById->id)->get()
        ) : [];

        $attrs['star_quiz'] = $repo->findById->report_type === 'star_quiz' ? QuizQuestionResource::collection(
            QuizQuestion::where('task_id', $repo->findById->id)->get()
        ) : [];

        parent::__construct($id, $attrs, $params);
    }

    /**
     * @param  TaskRepository  $repo
     */
    protected function abort(TaskRepository $repo)
    {
        if (! $repo->findById) {
            abort(404);
        } elseif (
            ! $repo->findById->is_challenge &&
            now() < Carbon::parse($repo->findById->start_at) &&
            ! \App::isLocal()
        ) {
            abort(404);
        }
    }
}
