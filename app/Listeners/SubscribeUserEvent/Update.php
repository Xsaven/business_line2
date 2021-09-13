<?php

namespace App\Listeners\SubscribeUserEvent;

use App\Events\SubscribeUserEvent;
use App\Notifications\UserSubscribedOnYou;
use App\Notifications\YouSubscribedOnUser;
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

            $auth->notify(
                new YouSubscribedOnUser($event->user)
            );

            $event->user->notify(
                new UserSubscribedOnYou($auth)
            );
        }
    }
}
