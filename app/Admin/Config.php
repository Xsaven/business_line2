<?php

namespace App\Admin;

use LteAdmin\Core\ConfigExtensionProvider;

/**
 * Config Class
 * @package App\Admin
 */
class Config extends ConfigExtensionProvider
{
    protected $scripts = [
        'js/admin.js?1',
        'ljs' => ['echo'],
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

}
