<?php

namespace App\Models\Traits\User;

use App\Mail\ResetPasswordMail;
use App\Notifications\ResetPasswordNotification;

/**
 * UserNotifyConfig Trait.
 * @package App\Models\Traits\User
 */
trait UserNotifyConfig
{
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        //$this->notify(new ResetPasswordNotification($token, $this->id));
        \Mail::send((new ResetPasswordMail($token, $this->id))->to($this->email));
    }
}
