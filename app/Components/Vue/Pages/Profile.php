<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\PositionResource;
use App\Models\Division;
use App\Models\Position;

/**
 * Profile Class.
 * @package App\Components\Vue\Pages
 */
class Profile extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_profile';


    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['positions'] = PositionResource::collection(Position::all())->toArray(request());
        $attrs['divisions'] = DivisionResource::collection(Division::all())->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
