<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Repositories\SettingRepository;

/**
 * Rule Class.
 * @package App\Components\Vue\Pages
 */
class Rule extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_rule';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['rules'] = app(SettingRepository::class)
            ->all->where('name', 'play_rules')->first()?->value;

        parent::__construct($id, $attrs, $params);
    }
}
