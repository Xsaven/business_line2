<?php

namespace App\Jobs;

use App\Events\Ws\AllAdminExec;
use App\Models\Online;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdminStatisticJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $online = User::select('id')->get()->filter(fn ($i) => $i->online())->count();

        $online_peck = (int) \Cache::get('online_peck', 0);

        $online_p = Online::orderByDesc('peck')->first();

        $online_p = $online_p ? $online_p->peck : $online_peck;

        if ($online > $online_p) {
            \Cache::forever('online_peck', $online);

            Online::create(['peck' => $online]);

            $online_peck = Online::orderByDesc('peck')->first()->peck;
        }

        AllAdminExec::dispatch(['questions:statistic' => [
            User::where('logins', '!=', '0')->count(),
            $online,
            $online_peck,
        ]]);
    }
}
