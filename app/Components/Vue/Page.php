<?php

namespace App\Components\Vue;

use App\Components\Wrapper;
use App\Providers\AppServiceProvider;
use Lar\Tagable\Vue;

class Page extends Vue
{
    /**
     * @var string
     */
    protected $extend = Wrapper::class;

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['settings'] = AppServiceProvider::$cfg;

        parent::__construct($id, $attrs, $params);
    }
}
