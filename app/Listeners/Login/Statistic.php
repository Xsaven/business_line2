<?php

namespace App\Listeners\Login;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Statistic
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->result()) {
            \Auth::user()->increment('logins');
        }
    }
}
