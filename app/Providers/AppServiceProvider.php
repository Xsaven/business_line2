<?php

namespace App\Providers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\Commentary;
use App\Models\CommentaryRoom;
use App\Models\Order;
use App\Models\Setting;
use App\Models\TaskReport;
use App\Models\User;
use App\Observers\CommentaryOserver;
use App\Observers\CommentaryRoomObserver;
use App\Observers\OrderOserver;
use App\Observers\TaskReportObserver;
use App\Observers\UserObserver;
use Illuminate\Database\Events\QueryExecuted;
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

        $this->debugDatabaseQueries();

        if (! \App::isLocal()) {
            if (config('app.url') == 'https://dl.frudev.ru') {
                LConfigs::add('ws_host', 'ws.frudev.ru');
            } else {
                LConfigs::add('ws_host', 'ws.dellin.ru');
            }
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

        Order::observe(OrderOserver::class);
        User::observe(UserObserver::class);
        TaskReport::observe(TaskReportObserver::class);
        Commentary::observe(CommentaryOserver::class);
        CommentaryRoom::observe(CommentaryRoomObserver::class);

        \URL::forceScheme('https');

        $this->app['request']->server->set('HTTPS', true);
    }

    public function debugDatabaseQueries()
    {
        if (env('DATABASE_QUERIES_DEBUG', false)) {
            \DB::listen(function (QueryExecuted $query) {
                $fullQuery = vsprintf(str_replace(['%', '?'], ['%%', '%s'], $query->sql), $query->bindings);

                $text = $query->connectionName.' ('.$query->time.'): '.$fullQuery;

                \Log::info($text);
            });
        }
    }
}
