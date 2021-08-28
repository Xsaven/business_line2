<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\PrizeResource;
use App\Models\Prize;
use App\Repositories\DirectionRepository;

/**
 * Direction Class
 * @package App\Components\Vue\Pages
 */
class Direction extends Page
{
    /**
     * Protected variable Element
     * @var string
     */
    protected $element = "pages_direction";


    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $repo = app(DirectionRepository::class);

        $attrs['direction'] = $repo->findBySlug->toArray(request());
        $attrs['prizes'] = PrizeResource::collection(Prize::all())->toArray(request());

        parent::__construct($id, $attrs, $params);
    }

}
