<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddAdminUserBalanceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param  int  $balance
     */
    public function __construct(
        public int $balance
    ) {
        $action = $this->balance > 0 ? 'увеличен' : 'уменьшен';
        $this->message = "Баланс был {$action} администратором на {$this->balance} баллов.";
    }
}
