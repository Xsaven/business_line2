<?php

namespace App\Events;

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
     * @param string $color
     */
    public function __construct(
        public string $phone,
        public string $email,
        public int $delivery_id,
        public string $color
    ){}
}
