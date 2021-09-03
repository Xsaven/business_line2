<?php

namespace App\Jax;

use App\Events\OrderEvent;
use App\Events\ReportDownloadFileImageTask;
use App\Events\ReportDownloadFileTask;
use App\Events\ReportImageVideoTask;
use App\Events\ReportPhotoTask;
use App\Events\ReportQuizTask;
use App\Events\ReportStarQuizTask;
use App\Events\ReportTaskEvent;
use App\Events\ReportTextImageTask;
use App\Events\ReportTextImageVideoTask;
use App\Events\ReportTextTask;
use App\Events\ReportTextVideoTask;
use App\Events\ReportVideoTask;
use App\Events\SubscribeDirectionEvent;
use App\Events\User\ChangeName;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\UserResource;
use App\Jobs\AdminStatisticJob;
use App\Jobs\OffLineJob;
use App\Repositories\AuthUserRepository;
use App\Repositories\TaskReportRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Lar\LJS\JaxExecutor;

/**
 * User Class.
 */
class User extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @param  AuthUserRepository  $repository
     * @return AuthUserResource
     */
    public function update(AuthUserRepository $repository)
    {
        return AuthUserResource::make(
            $repository->user
        );
    }

    /**
     * @return bool[]|false[]
     */
    public function change_name(string $name)
    {
        /** @var ChangeName $event */
        $event = new ChangeName($name);

        event($event);

        return ['result' => $event->result()];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function question_likes(UserRepository $repository)
    {
        return $repository->question_likes();
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function new_notifications(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NotificationResource::collection(
            app(AuthUserRepository::class)->new_notifications
        );
    }

    /**
     * @return array
     */
    public function mark_as_read_notifications(): array
    {
        return [
            'result' => app(AuthUserRepository::class)->mark_as_read_notifications(),
        ];
    }

    /**
     * @return string[]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function ping(bool $come_back = false, string $page = null)
    {
        $user = \Auth::user();

        \Cache::set("n:user:session:{$user->id}", 2, now()->addMinutes(3));
        \Cache::set("n:user:{$page}:{$user->id}", 2, now()->addMinutes(3));

        if (! $come_back) {
            \Auth::user()->increment('seconds', 60);
        }

        return ['result' => 'pong'];
    }

    /**
     * @param int $direction_id
     */
    public function follow_direction(int $direction_id)
    {
        $user_id = \Auth::user()->id;

        if (! \Auth::user()->direction_id) {
            /**
             * @var SubscribeDirectionEvent $event
             */
            $event = new SubscribeDirectionEvent($user_id, $direction_id);

            event($event);
        }

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param string $comment
     */
    public function text_report(int $task_id, string $comment)
    {
        /**
         * @var ReportTextTask
         */
        $event = new ReportTextTask($task_id, $comment);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param $videos
     */
    public function video_report(int $task_id, Request $request)
    {
        $videos = '';
        /**
         * @var ReportVideoTask
         */
        $event = new ReportVideoTask($task_id, $videos);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param Request $request
     */
    public function image_report(int $task_id, Request $request)
    {
        $files = [];

        $event = new ReportPhotoTask($task_id, $files);

        event($event);

        $this->reload();
    }

    public function text_or_image_or_video_report(int $task_id, string $comment, $files, $videos)
    {
        $files = [];
        $videos = [];

        /**
         * @var ReportTextImageVideoTask
         */
        $event = new ReportTextImageVideoTask($task_id, $comment, $files, $videos);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param Request $request
     */
    public function image_or_video_report(int $task_id, Request $request)
    {
        $files = [];
        $videos = [];

        /**
         * @var ReportImageVideoTask
         */
        $event = new ReportImageVideoTask($task_id, $files, $videos);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param string $comment
     * @param $videos
     */
    public function text_or_video_report(int $task_id, string $comment, $videos)
    {
        $videos = [];

        /**
         * @var ReportTextVideoTask
         */
        $event = new ReportTextVideoTask($task_id, $comment, $videos);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param string $comment
     * @param Request $request
     */
    public function text_or_image_report(int $task_id, string $comment, Request $request)
    {
        $files = $request->file('files');

        /**
         * @var ReportTextImageTask
         */
        $event = new ReportTextImageTask($task_id, $comment, $files);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param array $quiz_answers
     */
    public function quiz_report(int $task_id, array $quiz_answers)
    {
        $event = new ReportQuizTask($task_id, $quiz_answers);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param array $star_quiz_answers
     */
    public function star_quiz_report(int $task_id, array $star_quiz_answers)
    {
        $event = new ReportStarQuizTask($task_id, $star_quiz_answers);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     */
    public function download_file_report(int $task_id)
    {
        $event = new ReportDownloadFileTask($task_id);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param $files
     */
    public function download_file_image_report(int $task_id, $files)
    {
        $event = new ReportDownloadFileImageTask($task_id, $files);

        event($event);

        $this->reload();
    }

    public function create_order(string $phone, string $email, int $delivery_id, string $value,int $product_id)
    {
        $event = new OrderEvent($phone, $email, $delivery_id, $value,$product_id);

        event($event);

        $this->reload();
    }
}
