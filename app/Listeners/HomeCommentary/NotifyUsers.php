<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

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
