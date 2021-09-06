<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\DirectionResource;
use App\Http\Resources\PrizeResource;
use App\Http\Resources\TaskResource;
use App\Models\Prize;
use App\Models\Task;
use App\Models\User;
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

        if (! $repo->findBySlug) {
            abort(404);
        }

        $attrs['direction'] = DirectionResource::make($repo->findBySlug)->toArray(request());
        $attrs['dates'] = diff_day_chunk($repo->findBySlug->start_at, $repo->findBySlug->end_at);
        $attrs['users'] = $repo->findBySlug->users()->count();
        $attrs['tasks'] = collect(TaskResource::collection($repo->findBySlug->tasks)->toArray(request()))
            ->mapWithKeys(fn (array $i) => [$i['id'] => $i]);

        parent::__construct($id, $attrs, $params);
    }
}
