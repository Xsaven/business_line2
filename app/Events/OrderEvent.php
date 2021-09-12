<?php

namespace App\Events;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param string $phone
     * @param string $email
     * @param int $delivery_id
     * @param string $product_id
     * @param bool $validated
     * @param Product|null $product
     * @param Delivery|null $delivery
     */
    public function __construct(
        public string $phone,
        public string $email,
        public int $delivery_id,
        public string $product_id,
        public bool $validated = false,
        public ?Product $product = null,
        public ?Delivery $delivery = null,
    ) {
    }
}
