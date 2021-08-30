<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepository;

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
        $repo = app(TaskRepository::class);

        if (! $repo->findById) {
            abort(404);
        }

        $attrs['task'] = TaskResource::make($repo->findById)->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
