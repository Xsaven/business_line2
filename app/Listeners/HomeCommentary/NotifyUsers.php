<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  HomeCommentary  $event
     * @return void
     */
    public function handle(HomeCommentary $event)
    {
        //
    }
}
