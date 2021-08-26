<?php

namespace App\Components\Vue\Pages;

use App\Models\Setting;
use Lar\Tagable\Vue;

/**
 * Rule Class
 * @package App\Components\Vue\Pages
 */
class Rule extends Vue
{
    /**
     * Protected variable Element
     * @var string
     */
    protected $element = "pages_rule";

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['rules'] = Setting::whereName('play_rules')->first();

        parent::__construct($id, $attrs, $params);
    }

}
