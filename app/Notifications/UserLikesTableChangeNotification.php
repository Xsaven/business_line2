<?php

namespace App\Notifications;

class UserLikesTableChangeNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @param  int  $position
     * @param  int  $direction_id
     */
    public function __construct(
        public int $position,
        public int $direction_id,
    ) {
        $this->message = "Ваш рейтинг изменен на {$position} в";
        $this->link_title = 'турнирной таблице за лайки';
        $this->link = "/table/{$direction_id}?sort=balance";
    }
}
