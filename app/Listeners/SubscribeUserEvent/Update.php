<?php

namespace App\Listeners\SubscribeUserEvent;

use App\Events\SubscribeUserEvent;
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
            app(AuthUserRepository::class)
                ->user->subscriptions()->toggle($event->user_id);
        }
    }
}
