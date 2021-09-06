<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\TaskReportResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Repositories\TaskReportRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

/**
 * Search Class
 * @package App\Components\Vue\Pages
 */
class Search extends Page
{
    /**
     * Protected variable Element
     * @var string
     */
    protected $element = "pages_search";

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['users'] = UserResource::collection(
            app(UserRepository::class)->search((string) request('q'))
        )->toArray(request());

        $attrs['tasks'] = TaskResource::collection(
            app(TaskRepository::class)->search((string) request('q'))
        )->toArray(request());
        
        $attrs['reports'] = TaskReportResource::collection(
            app(TaskReportRepository::class)->search((string) request('q'))
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
