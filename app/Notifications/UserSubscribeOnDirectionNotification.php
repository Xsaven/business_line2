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
    public function __construct(Direction $direction)
    {
        $this->message = 'Вы успешно подписались на трек';
        $this->link_title = $direction->name;
        $this->link = '/direction/'.$direction->slug;
    }
}
