<?php

namespace App\Listeners\AddUserBalance;

use App\Events\AddUserBalance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLog
{
    /**
     * Handle the event.
     *
     * @param  AddUserBalance  $event
     * @return void
     */
    public function handle(AddUserBalance $event)
    {
        if ($event->user && $event->notification) {
            $event->user->ballances()->create([
                'task_id' => property_exists($event->notification, 'task') ? $event->notification->task?->id : null,
                'message' => $event->notification->message,
                'cost' => $event->balance,
            ]);

            if ($event->notification->message) {
                $event->user->logs()->create([
                    'field' => 'balance',
                    'type' => 'add_balance',
                    'message' => $event->notification->message,
                ]);
            }
            admin()->logs()->create([
                'field' => 'balance',
                'type' => 'add_balance',
                'message' => ($event->balance > 0 ? 'Увеличен' : 'Уменьшен').
                    " баланс пользователю {$event->user->full_name} на {$event->balance} баллов",
            ]);
        }
    }
}
