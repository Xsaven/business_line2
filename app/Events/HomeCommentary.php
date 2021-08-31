<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HomeCommentary
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var bool
     */
    public bool $validated = false;

    /**
     * @var bool
     */
    public bool $created = false;

    /**
     * Create a new event instance.
     *
     * @param  string  $message
     * @param  int|null  $parent_id
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
        return $this->validated && $this->created;
    }
}
