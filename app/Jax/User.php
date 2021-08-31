<?php

namespace App\Jax;

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
     * @param Request $request
     */
    public function task_report(int $task_id,string $comment,Request $request)
    {
        $files = $request->file('files');

        $user_id = \Auth::user()->id;


        $repo = app(TaskReportRepository::class);

        $repo->taskReport($task_id,$user_id,$comment,$files);
    }
}
