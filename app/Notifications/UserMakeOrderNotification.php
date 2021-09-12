<?php

namespace App\Notifications;

use App\Models\Product;

class UserMakeOrderNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->message = "Покупка \"{$product->name}\" за {$product->cost} баллов";
    }
}
