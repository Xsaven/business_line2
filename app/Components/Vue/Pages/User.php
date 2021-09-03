<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\UserResource;
use App\Models\TaskReport;
use App\Repositories\UserRepository;

/**
 * User Class
 * @package App\Components\Vue\Pages
 */
class User extends Page
{
    /**
     * Protected variable Element
     * @var string
     */
    protected $element = "pages_user";

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $repo = app(UserRepository::class);

        if (!$repo->findBySlug) {

            abort(404);
        }

        $attrs['user'] = UserResource::make($repo->findBySlug)->toArray(request());
        $attrs['complete_tasks_count'] = $repo->findBySlug->taskReports()
            ->where('status', TaskReport::STATUS_CHECKED)->count();

        parent::__construct($id, $attrs, $params);
    }
}
