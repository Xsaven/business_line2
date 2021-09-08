<?php

namespace App\Listeners\TaskLike;

use App\Events\TaskLike;
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
     * @param  TaskLike  $event
     * @return void
     */
    public function handle(TaskLike $event)
    {
        //
    }
}
