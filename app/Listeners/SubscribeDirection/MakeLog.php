<?php

namespace App\Listeners\SubscribeDirection;

use App\Events\SubscribeDirectionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLog
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
            $event->user->logs()->create([
                'field' => 'auth',
                'type' => 'direction',
                'message' => "Был подписан на направление {$event->direction->name}",
            ]);
        }
    }
}
