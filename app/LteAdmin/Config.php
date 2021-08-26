<?php

namespace App\LteAdmin;

use Lar\LteAdmin\Core\ConfigExtensionProvider;

/**
 * Config Class.
 */
class Config extends ConfigExtensionProvider
{
    /**
     * @var string[]
     */
    protected $scripts = [
        'js/admin.js',
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
