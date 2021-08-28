<?php

namespace App\Listeners\SubscribeDirection;

use App\Events\SubscribeDirectionEvent;
use App\Notifications\UserSubscribeOnDirectionNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUser
{
    /**
     * Handle the event.
     *
     * @param  SubscribeDirectionEvent  $event
     * @return void
     */
    public function handle(SubscribeDirectionEvent $event)
    {
        if ($event->user && $event->direction) {
            $event->user->notify(
                new UserSubscribeOnDirectionNotification($event->user, $event->direction)
            );
        }
    }
}
