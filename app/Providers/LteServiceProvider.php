<?php

namespace App\Providers;

use App\LteAdmin\Config;
use App\LteAdmin\Navigator;
use Lar\LteAdmin\ApplicationServiceProvider;

/**
 * LteServiceProvider Class.
 */
class LteServiceProvider extends ApplicationServiceProvider
{
    /**
     * Protected variable Navigator.
     * @var string
     */
    protected $navigator = Navigator::class;

    /**
     * Protected variable Config.
     * @var string
     */
    protected $config = Config::class;
}
