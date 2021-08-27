<?php

namespace App\Listeners\SubscribeDirection;

use App\Events\SubscribeDirectionEvent;
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
        if($event->user && $event->exist_direction) {
            $event->user->notify(

            );
        }
    }
}
