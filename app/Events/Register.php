<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Register
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $lastname;

    /**
     * @var string
     */
    public string $number;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * @var string
     */
    public string $password_confirmation;

    /**
     * @var User|null
     */
    public ?User $user = null;

    /**
     * @var bool
     */
    public $validated = false;

    /**
     * @var bool
     */
    public bool $attempted = false;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $lastname, $number, $email, $password, $password_confirmation)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->number = $number;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }

    /**
     * @return bool
     */
    public function result(): bool
    {
        return $this->validated && $this->attempted && $this->user;
    }
}
