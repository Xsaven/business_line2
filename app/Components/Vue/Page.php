<?php

namespace App\Components\Vue;

use App\Components\Wrapper;
use Lar\Tagable\Vue;

class Page extends Vue
{
    /**
     * @var string
     */
    protected $extend = Wrapper::class;
}
