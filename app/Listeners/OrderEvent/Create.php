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

        $setting_key = array_search($event->value, $product->settings);

        $scrap = $product->scrap;

        if ($scrap[$setting_key] > 0) {
            $scrap[$setting_key]--;
        } else {
            $event->validated = false;
        }

        if (
            $product->daily_limit > 0 &&
            $product->daily_limit == $product->daily_limit_by
        ) {
            $event->validated = false;
        }

        if ($user->balance < $product->cost) {
            $event->validated = false;
        }

        if (strlen(preg_replace('/[^0-9]/', '', $event->phone)) != 11) {
            $event->validated = false;
        }

        if ($event->validated) {
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
                    'value' => $product->settings ? $event->value : $product->settings[0],
                ],
            ]);

            $product->update([
                'scrap' => $scrap,
                'daily_limit_by' => $product->daily_limit_by+1
            ]);

            event(
                new AddUserBalance(
                    $user->id, -$product->cost, new UserMakeOrderNotification($product)
                )
            );

            \Auth::user()->logs()->create([
                'field' => 'order',
                'type' => 'new_order',
                'message' => 'Сделал заказ товара '.$product->name,
            ]);
        }
    }
}
