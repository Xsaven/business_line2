<?php

namespace App\Listeners\OrderEvent;

use App\Events\OrderEvent;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
{
    /**
     * @param OrderEvent $event
     */
    public function handle(OrderEvent $event)
    {
        $event->product = Product::find($event->product_id);
        $event->delivery = Delivery::find($event->delivery_id);

        if ($event->product && $event->delivery) {
            $event->validated = true;
        }
    }
}
