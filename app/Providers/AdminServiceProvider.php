<?php

namespace App\Providers;

use App\Admin\Config;
use App\Admin\Navigator;
use LteAdmin\ApplicationServiceProvider;

/**
 * AdminServiceProvider Class
 * @package App\Providers
 */
class AdminServiceProvider extends ApplicationServiceProvider
{
    /**
     * Protected variable Navigator
     * @var string
     */
    protected $navigator = Navigator::class;

    /**
     * Protected variable Config
     * @var string
     */
    protected $config = Config::class;

}
