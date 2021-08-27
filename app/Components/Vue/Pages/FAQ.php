<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\FaqResource;

/**
 * FAQ Class.
 * @package App\Components\Vue\Pages
 */
class FAQ extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_f_a_q';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['faqs'] = FaqResource::collection(\App\Models\Faq::all())->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
