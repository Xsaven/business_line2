<?php

namespace App\Providers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->register(FortifyServiceProvider::class);
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

        if (\Schema::hasTable('settings')) {
            $cfg = Setting::pluck('value', 'name')->toArray();
            \View::share('cfg', $cfg);
            config($cfg);
        }

        \View::share('route', \Route::currentRouteName());
    }
}
