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

        /**
         * Авторизация
         */

        \App\Events\Login::class => [ // Авторизация
            \App\Listeners\Login\Validation::class,
            \App\Listeners\Login\Attempt::class,
            \App\Listeners\Login\LogoutOtherWindows::class,
            \App\Listeners\Login\Statistic::class,
            \App\Listeners\Login\Respond::class,
        ],
        \App\Events\Register::class => [ // Регистрация
            \App\Listeners\Register\Validation::class,
            \App\Listeners\Register\Find::class,
            \App\Listeners\Register\Attempt::class,
            \App\Listeners\Register\Respond::class,
        ],

        /**
         * Пользователь
         */

        \App\Events\AddUserBalance::class => [ // Увеличить или уменьшить баланс пользователя (Глобальный ивент)
            \App\Listeners\AddUserBalance\UpdateBalance::class,
            \App\Listeners\AddUserBalance\MakeLog::class,
            \App\Listeners\AddUserBalance\NotifyUser::class,
            \App\Listeners\Ws\UpdateAuthUser::class,
        ],
        \App\Events\AdminAddUserBalance::class => [ // Увеличить или уменьшить баланс пользователя администратором
            \App\Listeners\AddUserBalance\UpdateBalance::class,
            \App\Listeners\AdminAddUserBalance\MakeLog::class,
            \App\Listeners\AdminAddUserBalance\NotifyUser::class,
            \App\Listeners\Ws\UpdateAuthUser::class,
        ],
        \App\Events\SubscribeDirectionEvent::class => [ // Выбрать направление
            \App\Listeners\SubscribeDirection\Attempt::class,
            \App\Listeners\SubscribeDirection\MakeLog::class,
            \App\Listeners\SubscribeDirection\NotifyUser::class,
        ],
        \App\Events\HomeCommentary::class => [ // Комментарий в комнату главной страницы
            \App\Listeners\HomeCommentary\Validation::class,
            \App\Listeners\HomeCommentary\Create::class,
            \App\Listeners\HomeCommentary\NotifyUsers::class,
        ],
        \App\Events\Commentary::class => [ // Комментарий, ответ на комментарий пользователя
            \App\Listeners\Commentary\Validation::class,
            \App\Listeners\Commentary\FindParent::class,
            \App\Listeners\Commentary\Create::class,
            \App\Listeners\Commentary\NotifyUsers::class,
        ],
        \App\Events\CommentaryLike::class => [ // Лайк комментарию
            \App\Listeners\CommentaryLike\Validation::class,
            \App\Listeners\CommentaryLike\Incrementing::class,
            \App\Listeners\CommentaryLike\NotifyUsers::class,
            \App\Listeners\CommentaryLike\UpdateUsers::class,
        ],
        \App\Events\TaskLike::class => [ // Лайк отчёту
            \App\Listeners\TaskLike\Validation::class,
            \App\Listeners\TaskLike\Incrementing::class,
            \App\Listeners\TaskLike\NotifyUsers::class,
            \App\Listeners\TaskLike\UpdateUsers::class,
        ],
        \App\Events\TaskSticker::class => [ // Стикер отчёту
            \App\Listeners\TaskSticker\Validation::class,
            \App\Listeners\TaskSticker\Incrementing::class,
            \App\Listeners\TaskSticker\NotifyUsers::class,
            \App\Listeners\TaskSticker\UpdateUsers::class,
        ],
        \App\Events\FileUpload::class => [ // Загрузка файлов отчёта
            \App\Listeners\FileUpload\ValidationImage::class,
            \App\Listeners\FileUpload\ValidationVideo::class,
            \App\Listeners\FileUpload\UploadImage::class,
            \App\Listeners\FileUpload\UploadVideo::class,
            \App\Listeners\FileUpload\UploadVideoToVimeo::class,
        ],
        \App\Events\OrderEvent::class => [ // Добавление товара в заказы
            \App\Listeners\OrderEvent\Validate::class,
            \App\Listeners\OrderEvent\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\SubscribeUserEvent::class => [ // Подписка на пользователя
            \App\Listeners\SubscribeUserEvent\Validate::class,
            \App\Listeners\SubscribeUserEvent\Update::class,
        ],

        /**
         * Отчёты по заданиям
         */
        \App\Events\ReportFunTask::class => [ // Отчёт с фанатской формы
            \App\Listeners\ReportFunTask\Validation::class,
            \App\Listeners\ReportFunTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextTask::class => [ // Текстовый отчёт
            \App\Listeners\ReportTextTask\Validation::class,
            \App\Listeners\ReportTextTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportVideoTask::class => [ // Видео отчёт
            \App\Listeners\ReportVideoTask\Validation::class,
            \App\Listeners\ReportVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportPhotoTask::class => [ // Фото отчёт
            \App\Listeners\ReportTask\PhotoValidate::class,
            \App\Listeners\ReportPhotoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextImageVideoTask::class => [ // Текст, Фото или Видео отчёт
            \App\Listeners\ReportTextImageVideoTask\Validation::class,
            \App\Listeners\ReportTextImageVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportImageVideoTask::class => [ // Фото или Видео отчёт
            \App\Listeners\ReportImageVideoTask\Validation::class,
            \App\Listeners\ReportImageVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextVideoTask::class => [ // Текст и Видео отчёт
            \App\Listeners\ReportTextVideoTask\Validation::class,
            \App\Listeners\ReportTextVideoTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportTextImageTask::class => [ // Текст и Фото отчёт
            \App\Listeners\ReportTextImageTask\Validation::class,
            \App\Listeners\ReportTextImageTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportQuizTask::class => [ // Викторина
            \App\Listeners\ReportQuizTask\Validate::class,
            \App\Listeners\ReportQuizTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportStarQuizTask::class => [ // Звёздная викторина
            \App\Listeners\ReportStarQuizTask\Validate::class,
            \App\Listeners\ReportStarQuizTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportDownloadFileTask::class => [ // Скачать файл
            \App\Listeners\ReportDownloadFileTask\Validate::class,
            \App\Listeners\ReportDownloadFileTask\Create::class,
            \App\Listeners\ReportTask\NotifyUsers::class,
        ],
        \App\Events\ReportDownloadFileImageTask::class => [ // Скачать файл и прикрепить фото
            \App\Listeners\ReportDownloadFileImageTask\Validate::class,
            \App\Listeners\ReportDownloadFileImageTask\Create::class,
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
