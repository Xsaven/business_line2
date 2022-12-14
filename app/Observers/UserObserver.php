<?php

namespace App\Observers;

use App\Events\Ws\Exec;
use App\Jobs\CalculateBalanceTableJob;
use App\Jobs\CalculateLikesTableJob;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if (false) {
            Exec::dispatch($user->id, 'update');
        }

        if ($user->balance > $user->max_balance) {
            $user->update(['max_balance' => $user->balance]);
        }

        if (!$user->active) {
            CalculateBalanceTableJob::dispatch();
            CalculateLikesTableJob::dispatch();
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
