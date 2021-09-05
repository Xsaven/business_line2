<?php

namespace App\Listeners\Commentary;

use App\Events\Commentary;
use App\Repositories\CommentaryRoomRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  Commentary  $event
     * @return void
     */
    public function handle(Commentary $event)
    {
        if ($event->validated) {
            $event->commentary = $event->parent->commentaries()->create([
                'text' => $event->message,
                'user_id' => \Auth::id(),
                'active' => \Auth::user()->active_commentaries || config('free_chat'),
            ]);

            if ($event->commentary) {
                $event->commentary->loadCount('likes');
            }

            $event->attempted = (bool) $event->commentary;
        }
    }
}
