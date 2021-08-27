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

class Exec implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array|Respond
     */
    public $exec = [];

    /**
     * @var int
     */
    private $user_id;

    /**
     * Create a new event instance.
     *
     * @param  int  $user_id
     * @param  array|string|Respond  $data
     */
    public function __construct(int $user_id, Respond|array|string $data)
    {
        if (is_string($data)) {
            $this->exec = [$data];
        } elseif ($data instanceof Respond) {
            $this->exec = $data->toArray();
        } elseif (is_array($data)) {
            $this->exec = $data;
        }
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.Models.User.'.$this->user_id);
    }
}
