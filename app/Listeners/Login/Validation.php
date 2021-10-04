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
     * @throws \Exception
     */
    public function handle(Login $event)
    {
        $event->validated = ! quick_validate(['login' => $event->login, 'password' => $event->password], [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $sid = session()->getId();
        $key = "login_count_{$sid}";
        $count = \Cache::get($key, 0);

        if ($count >= 3) {

            //throw new \Exception('Timeout');
            $event->validated = false;
            //respond()->toast_error('Попробуйте через 5 минут.');
        }
    }
}
