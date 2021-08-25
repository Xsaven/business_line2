<?php

namespace App\Events\Ws;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Lar\Layout\Respond;

/**
 * Class Live.
 */
class Live implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array|Respond
     */
    public $exec = [];

    /**
     * Create a new event instance.
     *
     * @param  array|Respond  $data
     */
    public function __construct($data)
    {
        if (is_string($data)) {
            $this->exec = [$data];
        } elseif ($data instanceof Respond) {
            $this->exec = $data->toArray();
        } elseif (is_array($data)) {
            $this->exec = $data;
        }
        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('Live');
    }
}
