<?php

namespace App\Listeners\AdminAddUserBalance;

use App\Events\AdminAddUserBalance;
use App\Notifications\AddAdminUserBalanceNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUser
{
    /**
     * Handle the event.
     *
     * @param  AdminAddUserBalance  $event
     * @return void
     */
    public function handle(AdminAddUserBalance $event)
    {
        if ($event->user) {
            $event->user->notify(
                new AddAdminUserBalanceNotification($event->balance)
            );
        }
    }
}
