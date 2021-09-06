<?php

namespace App\Components\Vue\Pages;

use App\Http\Resources\SupportResource;
use App\Repositories\SettingRepository;
use Lar\Tagable\Vue;

/**
 * GuestSupport Class.
 * @package App\Components\Vue\Pages
 */
class GuestSupport extends Vue
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_guest_support';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['settings'] = SupportResource::make(
            app(SettingRepository::class)
        )->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
