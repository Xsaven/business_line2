<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use App\Repositories\CommentaryRoomRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  HomeCommentary  $event
     * @return void
     */
    public function handle(HomeCommentary $event)
    {
        if ($event->validated) {
            $repo = app(CommentaryRoomRepository::class);

            $event->commentary = $repo->home->commentaries()->create([
                'text' => $event->message,
                'user_id' => \Auth::id(),
                'active' => \Auth::user()->active_commentaries,
            ]);

            if ($event->commentary) {
                $event->commentary->loadCount('likes');
            }

            $event->attempted = (bool) $event->commentary;
        }
    }
}
