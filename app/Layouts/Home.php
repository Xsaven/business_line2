<?php

namespace App\Layouts;

use App\Http\Resources\AuthUserResource;
use App\Http\Resources\DirectionResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\StickerResource;
use App\Http\Resources\UserResource;
use App\Providers\AppServiceProvider;
use App\Repositories\AuthUserRepository;
use App\Repositories\DirectionRepository;
use App\Repositories\StickerRepository;
use Illuminate\Http\Request;
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
    protected $name = 'home';

    /**
     * @var string
     */
    protected $default_title = 'Деловые Линии';

    /**
     * Protected variable HeadStyles.
     * @var array
     */
    protected $head_styles = [
        'css/app.css?12345',
        'ljs/css/ljs.css',
        'ljs',
    ];

    /**
     * Protected variable BodyScripts.
     * @var array
     */
    protected $body_scripts = [
        'https://player.vimeo.com/api/player.js',
        //'https://facecast.net/w/js/iframe.js',
        'https://facecast.net/v/js/iframe.js',
        'js/jquery-3.5.0.min.js',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js',
        'js/lozad.min.js',
        'js/inputmask.min.js',
        'js/nice-select.js',
        'js/functions.js',
        'js/scripts.js',
        'js/app_v28.js?123456',
        'ljs' => [
            'jq',
            'echo',
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
    protected $pjax = 'dirty_content';

    /**
     * Home constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $ts = 'v123456';

        $this->head->meta(['http-equiv' => 'CACHE-CONTROL', 'content' => 'NO-CACHE']);
        $this->head->meta(['http-equiv' => 'EXPIRES', 'content' => '0']);
        $this->head->meta(['http-equiv' => 'Content-Type', 'content' => 'text/html; charset=utf-8']);
        $this->head->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1']);
        $this->head->meta(['name' => 'format-detection', 'content' => 'telephone=no']);
        $this->head->meta(['name' => 'SKYPE_TOOLBAR', 'content' => 'SKYPE_TOOLBAR_PARSER_COMPATIBLE']);
        $this->head->link(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
        $this->head->link(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => '']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap']);
        $this->head->link(['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/styles.css?'.$ts)]);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_1899.css?'.$ts), 'media' => 'print, (max-width: 1899px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_1599.css?'.$ts), 'media' => 'print, (max-width: 1599px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_1439.css?'.$ts), 'media' => 'print, (max-width: 1439px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_1279.css?'.$ts), 'media' => 'print, (max-width: 1279px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_767.css?'.$ts), 'media' => 'print, (max-width: 767px)']);
        $this->head->link(['rel' => 'stylesheet', 'href' => asset('css/response_479.css?'.$ts), 'media' => '(max-width: 479px)']);
        $this->head->link(['rel' => 'icon', 'type' => 'image/png', 'href' => asset('favicon.ico')]);
        $this->head->link(['rel' => 'apple-touch-icon', 'href' => asset('favicon.ico')]);
        if (! \App::isLocal()) {
            $this->head->text($this->g_script_1());
            $this->body->text($this->g_script_2());
        }
        $this->applyStates(request());
    }

    /**
     * Create all possible states.
     * @param  Request  $request
     */
    protected function applyStates(Request $request)
    {
        $support = ! (isset(AppServiceProvider::$cfg['support']) && ! AppServiceProvider::$cfg['support']);
        $stickers = ! (isset(AppServiceProvider::$cfg['stickers']) && ! AppServiceProvider::$cfg['stickers']);
        if (\Auth::check()) {
            $auth_repo = app(AuthUserRepository::class);
            $this->js()->state('user', AuthUserResource::make(\Auth::user())->toArray($request));
            $this->js()->state('stickers', StickerResource::collection(
                app(StickerRepository::class)->active
            )->toArray($request));
            $this->js()->state('new_notifications_count', $auth_repo->new_notifications_count);
            $this->js()->state('new_notifications', NotificationResource::collection(
                $auth_repo->new_notifications
            )->toArray($request));
        } else {
            $this->js()->state('user', false);
        }
        $this->js()->state('support', (int) $support);
        $this->js()->state('stickers_home', (int) $stickers);
        if (\Auth::check() || $request->routeIs('support')) {
            $this->js()->state('directions', DirectionResource::collection(
                app(DirectionRepository::class)->all
            )->toArray(request()));
        }
    }

    /**
     * @return string
     */
    protected function g_script_1()
    {
        $script = <<<'SCRIPT'
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTDHV54');</script>
<!-- End Google Tag Manager -->
SCRIPT;

        return $script;
    }

    /**
     * @return string
     */
    protected function g_script_2()
    {
        $script = <<<'SCRIPT'
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTDHV54"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
SCRIPT;

        return $script;
    }
}
