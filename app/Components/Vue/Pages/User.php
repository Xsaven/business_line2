<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\TaskReportResource;
use App\Http\Resources\UserResource;
use App\Models\TaskReport;
use App\Repositories\UserRepository;

/**
 * User Class.
 * @package App\Components\Vue\Pages
 */
class User extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_user';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $repo = app(UserRepository::class);
        if (! $repo->findBySlug) {
            abort(404);
        }

        $attrs['user'] = UserResource::make($repo->findBySlug)->toArray(request());
        $attrs['complete_tasks_count'] = $repo->completeTaskCount;
        $attrs['task_reports'] = TaskReportResource::collection($repo->taskReports)->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
