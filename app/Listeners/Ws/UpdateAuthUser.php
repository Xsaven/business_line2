<?php

namespace App\Listeners\Ws;

use App\Events\AdminAddUserBalance;
use App\Events\Ws\Exec;
use App\Events\Ws\UpdateAuthUserDataExec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateAuthUser
{
    /**
     * Handle the event.
     *
     * @param  AdminAddUserBalance  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user) {
            Exec::dispatch($event->user->id, 'update');
        }
    }
}
