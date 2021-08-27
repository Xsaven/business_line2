<?php

namespace App\Components;

use Lar\Layout\Abstracts\Component;
use Lar\Layout\Tags\DIV;

/**
 * Wrapper Class
 * @package App\Components
 */
class Wrapper extends DIV
{
    /**
     * Protected variable Name
     * @var string
     */
    protected $name = "wrapper";

    /**
     * Protected variable HandlerName
     * @var string
     */
    protected $handler_name = "wrapper";

    /**
     * Protected variable Props
     * @var array
     */
    protected $props = [];

    /**
     * @param array $params
     * @return void
     */
    public function __construct(...$params) {
        
        parent::__construct();
        
        $this->when($params);
    }

    /**
     * @param  mixed  $component
     * @return Wrapper|Component|\Lar\Layout\LarDoc|void
     */
    public function slot($component)
    {
        $this->view('wrapper', ['content' => $component]);
    }
}
