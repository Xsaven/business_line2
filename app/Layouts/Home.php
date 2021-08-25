<?php

namespace App\Layouts;

use Lar\Layout\Abstracts\LayoutComponent;

/**
 * Home Class.
 */
class Home extends LayoutComponent
{
    /**
     * Protected variable Name.
     * @var string
     */
    protected $name = 'Деловые линии';

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
        'js/jquery-3.5.0.min.js',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js',
        'js/lozad.min.js',
        'js/inputmask.min.js',
        'js/nice-select.js',
        'js/functions.js',
        'js/scripts.js',
        'js/app.js',
        'ljs' => [
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

    /**
     * Home constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->head->meta(['http-equiv' => 'Content-Type', 'content' => 'text/html; charset=utf-8']);
        $this->head->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1']);
        $this->head->meta(['name' => 'format-detection', 'content' => 'telephone=no']);
        $this->head->meta(['name' => 'SKYPE_TOOLBAR', 'content' => 'SKYPE_TOOLBAR_PARSER_COMPATIBLE']);
        $this->head->link(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
        $this->head->link(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => '']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/styles.css']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_1899.css', 'media' => 'print, (max-width: 1899px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_1599.css', 'media' => 'print, (max-width: 1599px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_1439.css', 'media' => 'print, (max-width: 1439px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_1279.css', 'media' => 'print, (max-width: 1279px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_767.css', 'media' => 'print, (max-width: 767px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'css/response_479.css', 'media' => '(max-width: 479px)']);
        $this->head->text($this->g_script_1());
        $this->body->text($this->g_script_2());
    }

    /**
     * @return string
     */
    protected function g_script_1()
    {
        $script = <<<'SCRIPT'

SCRIPT;

        return $script;
    }

    /**
     * @return string
     */
    protected function g_script_2()
    {
        $script = <<<'SCRIPT'

SCRIPT;

        return $script;
    }
}
