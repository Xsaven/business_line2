<?php

namespace App\Observers;

use App\Events\AddUserBalance;
use App\Models\Order;
use App\Notifications\ReturnFundsToUser;
use App\Notifications\UserSuccessCompleteTaskReport;

class OrderOserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleting(Order $order)
    {
        foreach ($order->products as $product) {

            event(
                new AddUserBalance(
                    $order->user_id, $product->cost, new ReturnFundsToUser($product)
                )
            );

            if (admin()) {
                admin()->logs()->create([
                    'field' => 'id',
                    'type' => 'delete',
                    'message' => 'Удалил заказ',
                ]);
            }
        }
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
