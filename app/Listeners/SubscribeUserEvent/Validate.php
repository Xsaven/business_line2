<?php

namespace App\Listeners\SubscribeUserEvent;

use App\Events\SubscribeUserEvent;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
{
    /**
     * Handle the event.
     *
     * @param  SubscribeUserEvent  $event
     * @return void
     */
    public function handle(SubscribeUserEvent $event)
    {
        $event->user = app(UserRepository::class)
            ->find($event->user_id);

        $event->validated = (bool) $event->user;
    }
}
