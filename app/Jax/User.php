<?php

namespace App\Jax;

use App\Events\SubscribeDirectionEvent;
use App\Events\User\ChangeName;
use App\Http\Resources\UserResource;
use App\Jobs\AdminStatisticJob;
use App\Jobs\OffLineJob;
use App\Repositories\UserRepository;
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
     * @return UserResource
     */
    public function update(UserRepository $repository)
    {
        return UserResource::make(
            $repository->home_user()
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
     * @return string[]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function ping(bool $come_back = false)
    {
        $user = \Auth::user();

        \Cache::set('n:user:session:'.$user->id, 2, now()->addMinutes(3));

        if (!$come_back) {

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

        if(!\Auth::user()->direction_id) {
            /**
             * @var SubscribeDirectionEvent $event
             */
            $event = new SubscribeDirectionEvent($user_id, $direction_id);

            event($event);
        }

        $this->reload();
    }
}
