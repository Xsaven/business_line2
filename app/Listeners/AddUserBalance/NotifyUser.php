<?php

namespace App\Listeners\AddUserBalance;

use App\Events\AddUserBalance;
use App\Notifications\AddAdminUserBalanceNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUser
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
            $event->user->notify(
                new AddAdminUserBalanceNotification($event->balance)
            );
        }
    }
}
