<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\Login::class => [
            \App\Listeners\Login\Validation::class,
            \App\Listeners\Login\Attempt::class,
            \App\Listeners\Login\Statistic::class,
            \App\Listeners\Login\Respond::class,
        ],
        \App\Events\Register::class => [
            \App\Listeners\Register\Validation::class,
            \App\Listeners\Register\Attempt::class,
            \App\Listeners\Register\Respond::class,
        ],
        \App\Events\AddUserBalance::class => [
            \App\Listeners\AddUserBalance\UpdateBalance::class,
            \App\Listeners\AddUserBalance\MakeLog::class,
            \App\Listeners\AddUserBalance\NotifyUser::class,
            \App\Listeners\Ws\UpdateAuthUser::class,
        ],
        \App\Events\AdminAddUserBalance::class => [
            \App\Listeners\AddUserBalance\UpdateBalance::class,
            \App\Listeners\AdminAddUserBalance\MakeLog::class,
            \App\Listeners\AdminAddUserBalance\NotifyUser::class,
            \App\Listeners\Ws\UpdateAuthUser::class,
        ],
        \App\Events\SubscribeDirectionEvent::class => [
            \App\Listeners\SubscribeDirection\Attempt::class,
            \App\Listeners\SubscribeDirection\MakeLog::class,
            \App\Listeners\SubscribeDirection\NotifyUser::class,
        ],
        \App\Events\Commentary::class => [
            \App\Listeners\Commentary\Validation::class,
            \App\Listeners\Commentary\Create::class,
            \App\Listeners\Commentary\NotifyUsers::class,
        ],
        \App\Events\HomeCommentary::class => [
            \App\Listeners\HomeCommentary\Validation::class,
            \App\Listeners\HomeCommentary\Create::class,
            \App\Listeners\HomeCommentary\NotifyUsers::class,
        ],
        \App\Events\ReportTaskEvent::class => [
            \App\Listeners\ReportTaskEvent\Create::class,
            \App\Listeners\ReportTaskEvent\Validation::class,
            \App\Listeners\ReportTaskEvent\NotifyUsers::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
