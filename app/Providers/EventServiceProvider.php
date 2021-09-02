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
        \App\Events\HomeCommentary::class => [
            \App\Listeners\HomeCommentary\Validation::class,
            \App\Listeners\HomeCommentary\Create::class,
            \App\Listeners\HomeCommentary\NotifyUsers::class,
        ],
        \App\Events\Commentary::class => [
            \App\Listeners\Commentary\Validation::class,
            \App\Listeners\Commentary\FindParent::class,
            \App\Listeners\Commentary\Create::class,
            \App\Listeners\Commentary\NotifyUsers::class,
        ],
        \App\Events\CommentaryLike::class => [
            \App\Listeners\CommentaryLike\Validation::class,
            \App\Listeners\CommentaryLike\Incrementing::class,
            \App\Listeners\CommentaryLike\NotifyUsers::class,
        ],
        \App\Events\ReportTaskEvent::class => [
            \App\Listeners\ReportTaskEvent\Create::class,
            \App\Listeners\ReportTaskEvent\Validation::class,
            \App\Listeners\ReportTaskEvent\NotifyUsers::class,
        ],
        \App\Events\ReportTextTask::class => [
            \App\Listeners\ReportTask\TextValidate::class,
            \App\Listeners\ReportTextTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportVideoTask::class => [
            \App\Listeners\ReportTask\VideoValidate::class,
            \App\Listeners\ReportTask\VideoUpload::class,
            \App\Listeners\ReportVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportPhotoTask::class => [
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportTask\PhotoUpload::class,
            \App\Listeners\ReportPhotoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextImageVideoTask::class => [
            \App\Listeners\ReportTask\TextValidate::class,
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportTask\PhotoUpload::class,
            \App\Listeners\ReportTask\VideoValidate::class,
            \App\Listeners\ReportTask\VideoUpload::class,
            \App\Listeners\ReportTextImageVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportImageVideoTask::class => [
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportTask\PhotoUpload::class,
            \App\Listeners\ReportTask\VideoValidate::class,
            \App\Listeners\ReportTask\VideoUpload::class,
            \App\Listeners\ReportImageVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextVideoTask::class => [
            \App\Listeners\ReportTask\TextValidate::class,
            \App\Listeners\ReportTask\VideoValidate::class,
            \App\Listeners\ReportTask\VideoUpload::class,
            \App\Listeners\ReportTextVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextImageTask::class => [
            \App\Listeners\ReportTask\TextValidate::class,
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportTask\PhotoUpload::class,
            \App\Listeners\ReportTextVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportQuizTask::class => [
            \App\Listeners\ReportQuizTask\Validate::class,
            \App\Listeners\ReportQuizTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportStarQuizTask::class => [
            \App\Listeners\ReportStarQuizTask\Validate::class,
            \App\Listeners\ReportStarQuizTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportDownloadFileTask::class => [
            \App\Listeners\ReportDownloadFileTask\Validate::class,
            \App\Listeners\ReportDownloadFileTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],

        \App\Events\ReportDownloadFileImageTask::class => [
            \App\Listeners\ReportDownloadFileImageTask\Validate::class,
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportTask\PhotoUpload::class,
            \App\Listeners\ReportDownloadFileImageTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],

        \App\Events\OrderEvent::class => [
            \App\Listeners\OrderEvent\Validate::class,
            \App\Listeners\OrderEvent\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
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
