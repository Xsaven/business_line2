<?php

namespace App\Admin\Jax;

use App\Events\Ws\AllUserExec;
use App\Models\Setting;
use App\Providers\AppServiceProvider;
use LteAdmin\Jax\LteAdminExecutor;

class HomeControl extends LteAdminExecutor
{
    public function switch_banner()
    {
        Setting::whereName('banner')
            ->update(['value' => ! AppServiceProvider::$cfg['banner']]);

        AllUserExec::dispatch(['doc::reload']);

        lte_log_success(
            (AppServiceProvider::$cfg['banner'] ? 'Выключил' : 'Включил').' режим банера'
        );

        $this->reload();
    }
}
