<?php

namespace App\Listeners\CommentaryLike;

use App\Events\CommentaryLike;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  CommentaryLike  $event
     * @return void
     */
    public function handle(CommentaryLike $event)
    {
        $event->validated = ! quick_validate(['id' => $event->commentary_id], [
                'id' => 'required|int|min:1|exists:commentaries,id',
            ]) && \Auth::check();
    }
}
