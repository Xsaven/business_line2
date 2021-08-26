<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddUserBalanceNotification extends Notification
{
    use Queueable;

    /**
     * @var int
     */
    protected int $balance;

    /**
     * @var string
     */
    protected string $issued_by;

    /**
     * Create a new notification instance.
     *
     * @param  int  $balance
     * @param  string  $issued_by
     */
    public function __construct(int $balance, string $issued_by = '')
    {
        $this->balance = $balance;
        $this->issued_by = $issued_by;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $text = $this->balance > 0 ? 'увеличен' : 'уменьшен';

        return [
            'message' => "Ваш баланс был {$text} на {$this->balance} баллов".
                ($this->issued_by ? ' '.$this->issued_by : '').'.',
            'link_title' => null,
            'link' => null,
        ];
    }
}
