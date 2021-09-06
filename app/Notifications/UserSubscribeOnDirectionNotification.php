<?php

namespace App\Notifications;

use App\Models\Direction;
use App\Models\User;

class UserSubscribeOnDirectionNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Direction $direction)
    {
        $this->message = "Вы успешно подписались на трек {$direction->name}!";
        $this->user_id = $user->id;
    }
}
