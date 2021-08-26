<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddUserBalance
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var int
     */
    public int $user_id;

    /**
     * @var int
     */
    public int $balance;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $user_id, int $balance)
    {
        $this->user_id = $user_id;
        $this->balance = $balance;
    }
}
