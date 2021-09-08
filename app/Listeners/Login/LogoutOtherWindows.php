<?php

namespace App\Listeners\Login;

use App\Events\Login;
use App\Events\Ws\Exec;
use App\Events\Ws\ExecNoSelf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutOtherWindows
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->validated && \Auth::id()) {
            Exec::dispatch(\Auth::id(), 'v-layout:logout');
        }
    }
}
