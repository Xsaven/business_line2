<?php

namespace App\Listeners\AdminAddUserBalance;

use App\Events\AdminAddUserBalance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdminAddUserBalance  $event
     * @return void
     */
    public function handle(AdminAddUserBalance $event)
    {
        //
    }
}
