<?php

namespace App\Listeners\Login;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Login $event)
    {
        $event->validated = ! quick_validate(['login' => $event->login, 'password' => $event->password], [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
    }
}
