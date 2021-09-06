<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

/**
 * Table Class.
 * @package App\Components\Vue\Pages
 */
class Table extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_table';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $sort = request('sort', 'balance');

        $attrs['sort'] = $sort !== 'balance' && $sort !== 'likes' ? 'balance' : $sort;

        $attrs['users'] = app(\App\Jax\Table::class)
            ->pagination(request()->direction, $attrs['sort'])
            ->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
