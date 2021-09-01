<?php

namespace App\Listeners\CommentaryLike;

use App\Events\CommentaryLike;
use App\Repositories\AuthUserRepository;
use App\Repositories\CommentaryRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Incrementing
{
    /**
     * Handle the event.
     *
     * @param  CommentaryLike  $event
     * @return void
     */
    public function handle(CommentaryLike $event)
    {
        if ($event->validated) {
            $event->attempted = (bool) app(AuthUserRepository::class)
                ->user
                ->commentaryLikes()
                ->toggle([$event->commentary_id]);

            $event->commentary = app(CommentaryRepository::class)
                ->find($event->commentary_id);
        }
    }
}
