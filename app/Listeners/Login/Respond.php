<?php

namespace App\Listeners\Login;

use App\Events\Login;
use App\Jobs\AdminStatisticJob;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Respond
{
    /**
     * Handle the event.
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function handle(Login $event)
    {
        if ($event->result()) {
            respond()->reload();
            AdminStatisticJob::dispatch();
            \Auth::user()->logs()->create([
                'field' => 'auth',
                'type' => 'login',
                'message' => 'Был авторизирован',
            ]);
        } else {
            $sid = session()->getId();
            $key = "login_count_{$sid}";
            $key_time = "login_count_{$sid}_time";
            $count = \Cache::get($key, 0);
            if (! \Cache::has($key_time) || $count == 3) {
                \Cache::set($key_time, time() + (5 * 60), now()->addMinutes(10));
            }
            if (\Cache::has($key_time) && $count == 0) {
                \Cache::forget($key_time);
            }
            if ($count == 3) {
                respond()->toast_error('Превышено количество попыток входа попробуйте повторно через 5 минут.');
            } elseif ($count > 3) {
                $minutes = round((\Cache::get($key_time, time()) - time()) / 60);
                if ($minutes <= 0) {
                    \Cache::forget($key_time);
                    \Cache::set($key, 0);
                }
                respond()->toast_error(
                    "Авторизация отключена по таймауту, попробуйте повторно через {$minutes} ".
                    \Lang::choice('минута|минуты|минуту', $minutes, [], 'ru')
                );
            }
            \Cache::set($key, $count + 1, now()->addMinutes(5));
        }
    }
}
