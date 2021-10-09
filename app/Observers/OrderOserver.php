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

            $scrap_key = array_search(
                $product->pivot->value,
                $product->settings
            );

            if (
                $scrap_key !== false
            ) {
                $scrap = $product->scrap ?: [];
                $scrap[$scrap_key]++;
                $product->update(['scrap' => $scrap]);
            }

            if ($order->created_at->format('Y.m.d') == now()->format('Y.m.d')) {

                $new_daily_by = $product->daily_limit_by - 1;

                $product->update([
                    'daily_limit_by' => $new_daily_by > 0 ? $new_daily_by : 0
                ]);
            }

            if (admin()) {
                admin()->logs()->create([
                    'field' => 'id',
                    'type' => 'delete',
                    'message' => 'Удалил заказ '.$order->id,
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
