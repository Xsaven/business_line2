<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Commentary
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var bool
     */
    public bool $validated = false;

    /**
     * @var bool
     */
    public bool $attempted = false;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public string $message,
        public ?int $parent_id = null
    ) {}

    /**
     * @return bool
     */
    public function result(): bool
    {
        return $this->validated && $this->attempted;
    }
}
