<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\CommentaryResource;
use App\Http\Resources\DirectionResource;
use App\Models\CommentaryRoom;
use App\Repositories\CommentaryRepository;
use App\Repositories\DirectionRepository;

/**
 * Home Class.
 */
class Home extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_home';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['commentaries'] = CommentaryResource::collection(
            app(CommentaryRepository::class)->home_commentaries
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
