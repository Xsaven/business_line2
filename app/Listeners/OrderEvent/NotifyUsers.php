<?php

namespace App\Listeners\OrderEvent;

use App\Events\OrderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        if ($event->validated) {
            respond()->toast_success('Заказ оформлен!');
        } else {
            respond()->toast_error('Возникли ошибки при оформлении заказа!');
        }
    }
}
