<?php

namespace App\Components\Vue\Pages;

use App\Http\Resources\FaqResource;
use Lar\Tagable\Vue;

/**
 * FAQ Class
 * @package App\Components\Vue\Pages
 */
class FAQ extends Vue
{
    /**
     * Protected variable Element
     * @var string
     */
    protected $element = "pages_f_a_q";


    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['faqs'] = FaqResource::collection(\App\Models\Faq::all())->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
