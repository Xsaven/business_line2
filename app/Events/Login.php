<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Login
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public string $login;

    /**
     * @var string
     */
    public string $password;

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
    public function __construct(string $login, string $password)
    {
        $this->login = $login;

        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function result(): bool
    {
        return $this->validated && $this->attempted;
    }
}
