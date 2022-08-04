<?php

namespace LteAdminOld;

/**
 * Config Class.
 */
class Config
{
    /**
     * @var string[]
     */
    protected $scripts = [
        'js/admin.js?1',
        'ljs' => ['echo'],
    ];

    /**
     * @return void
     */
    public function boot()
    {
        //
    }
}
