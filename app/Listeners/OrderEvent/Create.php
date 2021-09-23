<?php

namespace App\Listeners\OrderEvent;

use App\Events\AddUserBalance;
use App\Events\OrderEvent;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\UserMakeOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        $user = \Auth::user();

        $product = Product::whereId($event->product_id)->first();

        $order = Order::create([
            'phone' => $event->phone,
            'email' => $event->email,
            'status' => Order::STATUS_APPROVED,
            'user_id' => $user->id,
            'delivery_id' => $event->delivery_id,
        ]);

        $order->products()->sync([
           $product->id => [
               'order_id' => $order->id,
           ],
        ]);

        event(
            new AddUserBalance(
                $user->id, -$product->cost, new UserMakeOrderNotification($product)
            )
        );
    }
}
