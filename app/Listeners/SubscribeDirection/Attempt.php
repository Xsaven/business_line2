<?php

namespace App\Listeners\SubscribeDirection;

use App\Events\SubscribeDirectionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Attempt
{
    /**
     * Handle the event.
     *
     * @param  SubscribeDirectionEvent  $event
     * @return void
     */
    public function handle(SubscribeDirectionEvent $event)
    {
        if($event->user && $event->direction) {
            $event->user->update([
                'direction_id' => $event->direction_id
            ]);
        }
    }
}
