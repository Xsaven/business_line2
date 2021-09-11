<?php

namespace App\Providers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\Setting;
use App\Models\TaskReport;
use App\Models\User;
use App\Observers\TaskReportObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Lar\Layout\Core\LConfigs;
use Laravel\Fortify\Fortify;

class AppServiceProvider extends ServiceProvider
{
    public static $cfg = [];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->register(FortifyServiceProvider::class);

        if (! \App::isLocal()) {
            LConfigs::add('ws_host', 'ws.dellin.ru');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        \Cache::store('redis');

        if (\Schema::hasTable('settings') && class_exists(Setting::class)) {
            $cfg = Setting::pluck('value', 'name')->toArray();
            static::$cfg = $cfg;
            \View::share('cfg', $cfg);
            config($cfg);
        }

        \View::share('route', \Route::currentRouteName());

        User::observe(UserObserver::class);
        TaskReport::observe(TaskReportObserver::class);
    }
}
