<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\TaskReportResource;
use App\Http\Resources\TaskResource;
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

        $report = $user->taskReports->where('task_id', $attrs['task']['id'])->first();

        if ($report) {
            $attrs['task_report'] = TaskReportResource::make($report)->toArray(request());
            $attrs['reports'] = TaskReportResource::collection(
                $repo->findById->taskReports()->where('status', TaskReport::STATUS_CHECKED)
            )->toArray(request());
        } else {
            $attrs['task_report'] = null;
            $attrs['reports'] = null;
        }

        parent::__construct($id, $attrs, $params);
    }
}
