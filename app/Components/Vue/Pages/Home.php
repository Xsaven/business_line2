<?php

namespace App\Components\Vue\Pages;

use App\Http\Resources\DirectionResource;
use App\Repositories\DirectionRepository;
use Lar\Tagable\Vue;

/**
 * Home Class.
 */
class Home extends Vue
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_home';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['directions'] = DirectionResource::make(
            app(DirectionRepository::class)
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
