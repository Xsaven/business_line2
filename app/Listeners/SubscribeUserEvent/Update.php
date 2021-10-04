<?php

namespace App\Listeners\SubscribeUserEvent;

use App\Events\SubscribeUserEvent;
use App\Notifications\UserSubscribedOnYou;
use App\Notifications\UserUnSubscribedOnYou;
use App\Notifications\YouSubscribedOnUser;
use App\Notifications\YouUnSubscribedOnUser;
use App\Repositories\AuthUserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Update
{
    /**
     * Handle the event.
     *
     * @param  SubscribeUserEvent  $event
     * @return void
     */
    public function handle(SubscribeUserEvent $event)
    {
        if ($event->validated) {
            $auth = app(AuthUserRepository::class)
                ->user;

            $auth->subscriptions()
                ->toggle($event->user_id);

            $state = (bool) $auth->subscriptions()
                ->where('id', $event->user_id)
                ->count();

            if ($state) {
                $auth->notify(
                    new YouSubscribedOnUser($event->user)
                );

                $event->user->notify(
                    new UserSubscribedOnYou($auth)
                );

                $auth->logs()->create([
                    'field' => 'user',
                    'type' => 'subscribe',
                    'message' => 'Подписался на пользователя '.$event->user->full_name,
                ]);
            } else {
                $auth->notify(
                    new YouUnSubscribedOnUser($event->user)
                );

                $event->user->notify(
                    new UserUnSubscribedOnYou($auth)
                );

                $auth->logs()->create([
                    'field' => 'user',
                    'type' => 'subscribe',
                    'message' => 'Отписался от пользователя '.$event->user->full_name,
                ]);
            }
        }
    }
}
