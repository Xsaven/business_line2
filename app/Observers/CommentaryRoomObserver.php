<?php

namespace App\Observers;

use App\Events\Ws\AllUserExec;
use App\Models\CommentaryRoom;

class CommentaryRoomObserver
{
    /**
     * Handle the CommentaryRoom "created" event.
     *
     * @param  \App\Models\CommentaryRoom  $commentaryRoom
     * @return void
     */
    public function created(CommentaryRoom $commentaryRoom)
    {
        //
    }

    /**
     * Handle the CommentaryRoom "updated" event.
     *
     * @param  \App\Models\CommentaryRoom  $commentaryRoom
     * @return void
     */
    public function updated(CommentaryRoom $commentaryRoom)
    {
        if (
            ($commentaryRoom->video_data !== $commentaryRoom->getRawOriginal('video_data')) ||
            ($commentaryRoom->state !== $commentaryRoom->getRawOriginal('state')) ||
            ($commentaryRoom->translation_data !== $commentaryRoom->getRawOriginal('translation_data'))
        ) {
            AllUserExec::dispatch(['doc::reload']);
        }
    }

    /**
     * Handle the CommentaryRoom "deleted" event.
     *
     * @param  \App\Models\CommentaryRoom  $commentaryRoom
     * @return void
     */
    public function deleted(CommentaryRoom $commentaryRoom)
    {
        //
    }

    /**
     * Handle the CommentaryRoom "restored" event.
     *
     * @param  \App\Models\CommentaryRoom  $commentaryRoom
     * @return void
     */
    public function restored(CommentaryRoom $commentaryRoom)
    {
        //
    }

    /**
     * Handle the CommentaryRoom "force deleted" event.
     *
     * @param  \App\Models\CommentaryRoom  $commentaryRoom
     * @return void
     */
    public function forceDeleted(CommentaryRoom $commentaryRoom)
    {
        //
    }
}
