<?php

namespace App\Listeners\AddUserBalance;

use App\Events\AddUserBalance;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateBalance
{
    /**
     * Handle the event.
     *
     * @param  AddUserBalance  $event
     * @return void
     */
    public function handle(AddUserBalance $event)
    {
        $user = User::find($event->user_id);

        $new_balance = $user->balance + $event->balance;

        if ($new_balance < 0) {
            $new_balance = 0;
        }

        $user->update([
            'balance' => $new_balance,
        ]);
    }
}
