<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\SupportResource;
use App\Repositories\SettingRepository;

/**
 * Support Class.
 * @package App\Components\Vue\Pages
 */
class Support extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_support';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['settings'] = SupportResource::make(
            app(SettingRepository::class)
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
