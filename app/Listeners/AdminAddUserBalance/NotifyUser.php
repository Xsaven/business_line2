<?php

namespace App\Listeners\AdminAddUserBalance;

use App\Events\AdminAddUserBalance;
use App\Notifications\AddUserBalanceNotification;
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
                new AddUserBalanceNotification($event->balance, 'администратором')
            );
        }
    }
}
