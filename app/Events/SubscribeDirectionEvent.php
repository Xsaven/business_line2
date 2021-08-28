<?php

namespace App\Events;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubscribeDirectionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Direction|bool|null
     */
    public ?Direction $direction = null;

    /**
     * @param int $user_id
     * @param int $direction_id
     * @param User|null $user
     */
    public function __construct(
        public int $user_id,
        public int $direction_id,
        public ?User $user = null
    ) {
        $this->user = User::find($this->user_id);

        $this->direction = Direction::whereId($this->direction_id)->first();
    }
}
