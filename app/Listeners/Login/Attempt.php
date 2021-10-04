<?php

namespace App\Listeners\Login;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Attempt
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->validated) {
            $event->attempted =
                \Auth::attempt([
                    'login' => $event->login,
                    'password' => $event->password,
                    'active' => 1,
                ], true);
            if (! $event->attempted) {
                $event->attempted =
                    \Auth::attempt([
                        'number' => $event->login,
                        'password' => $event->password,
                        'active' => 1,
                    ], true);
            }
        }
    }
}
