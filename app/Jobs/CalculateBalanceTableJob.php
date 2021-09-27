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
                ->orderBy('name', 'ASC')
                ->orderBy('lastname', 'ASC')
                ->get(['id', 'balance', 'password', 'direction_id']);

            foreach ($users as $key => $user) {
                $position = $key + 1;

                $cache_key = "user_balance_position_{$direction->id}_{$user->id}";

                if (\Cache::has($cache_key) && \Cache::get($cache_key) != $position) {
                    $changed = true;
                    if (
                        ($position >= 1 && $position <= 5) ||
                        ! ($position % 10)
                    ) {
                        if (! \Cache::has("sended_user_balance_position_{$position}_{$user->direction_id}")) {
                            $user->notify(
                                new UserBallanceTableChangeNotification($position, $user->direction_id)
                            );
                            \Cache::set("sended_user_balance_position_{$position}_{$user->direction_id}", 1, now()->addMinute());
                        }
                    }
                }
                \Cache::set($cache_key, $position);
            }
        }

        if ($changed) {
            AllUserExec::dispatch('pages_table:load');
        }
    }
}
