<?php

namespace App\Notifications;

use App\Models\Product;

class ReturnFundsToUser extends Notification
{
    public function __construct(
        public Product $product
    ) {
        $this->message = "Возврат средств {$this->product->cost} баллов.";
    }
}
