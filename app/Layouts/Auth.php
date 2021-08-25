<?php

namespace App\Layouts;

/**
 * Auth Class.
 */
class Auth extends Home
{
    /**
     * Protected variable Name.
     * @var string
     */
    protected $name = 'Auth';

    /**
     * Protected variable HeadStyles.
     * @var array
     */
    protected $head_styles = [
        'css/app.css',
        'ljs/css/ljs.css',
        'ljs',
    ];

    /**
     * Protected variable BodyScripts.
     * @var array
     */
    protected $body_scripts = [
        'js/app.js',
        'ljs' => [
            'jquery',
            'jq',
            'alert',
            'nav',
            'vue',
        ],
    ];

    /**
     * Protected variable Metas.
     * @var array
     */
    protected $metas = [];

    /**
     * To enable the module, specify the container identifier in the parameter.
     * @var bool|string
     */
    protected $pjax = false;
}
