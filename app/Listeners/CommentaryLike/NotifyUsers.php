<?php

namespace App\Listeners\CommentaryLike;

use App\Events\CommentaryLike;
use App\Events\Ws\AllUserExec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  CommentaryLike  $event
     * @return void
     */
    public function handle(CommentaryLike $event)
    {
        if ($event->result() && $event->commentary) {
            AllUserExec::dispatch([
                'update::commentary_id' => $event->commentary->id,
                'update' => [],
            ]);
        }
    }
}
