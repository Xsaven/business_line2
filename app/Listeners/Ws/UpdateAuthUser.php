<?php

namespace App\Listeners\Ws;

use App\Events\AddUserBalance;
use App\Events\Ws\Exec;
use App\Events\Ws\UpdateAuthUserDataExec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateAuthUser
{
    /**
     * Handle the event.
     *
     * @param  AddUserBalance  $event
     * @return void
     */
    public function handle(AddUserBalance $event)
    {
        if ($event->user) {
            Exec::dispatch($event->user->id, 'update');
        }
    }
}
