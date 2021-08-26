<?php

namespace App\Components\Vue\Pages;

use App\Http\Resources\SettingResource;
use App\Http\Resources\SupportResource;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Lar\Tagable\Vue;

/**
 * Support Class.
 * @package App\Components\Vue\Pages
 */
class Support extends Vue
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_support';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['settings'] = SupportResource::make(
            app(SettingRepository::class)
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
