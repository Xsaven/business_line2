<?php

namespace App\Listeners\Register;

use App\Events\Register;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Attempt
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Register $event)
    {
        if ($event->validated && $event->user) {
            $event->attempted = $event->user->update([
                'password' => bcrypt($event->password),
            ]);
            if (! $event->user->email && $event->attempted) {
                $event->attempted = $event->user->update([
                    'email' => $event->email,
                ]);
            }
        }
    }
}
