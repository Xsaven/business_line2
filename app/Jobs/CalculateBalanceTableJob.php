<?php

namespace App\Jobs;

use App\Events\Ws\AllUserExec;
use App\Models\Direction;
use App\Models\User;
use App\Notifications\UserBallanceTableChangeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateBalanceTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function handle()
    {
        $changed = false;

        foreach (Direction::all() as $direction) {

            $users = User::where('direction_id', $direction->id)
                ->orderByDesc('balance')
                ->get(['id', 'balance', 'password', 'direction_id']);

            foreach ($users as $key => $user) {
                $position = $key + 1;

                $cache_key = "user_balance_position_{$direction->id}_{$user->id}";

                if (\Cache::has($cache_key) && \Cache::get($cache_key) != $position) {
                    $changed = true;
                    $user->notify(
                        new UserBallanceTableChangeNotification($position, $user->direction_id)
                    );
                }
                \Cache::set($cache_key, $position);
            }
        }

        if ($changed) {
            AllUserExec::dispatch('pages_table:load');
        }
    }
}
