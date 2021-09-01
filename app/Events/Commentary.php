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
     * @var \App\Models\Commentary
     */
    public \App\Models\Commentary $parent;

    /**
     * @var \App\Models\Commentary|null
     */
    public ?\App\Models\Commentary $commentary = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public string $message,
        public int $parent_id
    ) {
    }

    /**
     * @return bool
     */
    public function result(): bool
    {
        return $this->validated && $this->attempted;
    }
}
