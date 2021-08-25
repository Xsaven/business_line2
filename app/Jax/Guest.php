<?php

namespace App\Jax;

use App\Events\Login;
use App\Events\Register;
use Lar\LJS\JaxExecutor;

/**
 * Guest Class.
 */
class Guest extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::guest();
    }

    /**
     * @param  string  $login
     * @param  string  $password
     * @return array
     */
    public function login(string $login, string $password): array
    {
        $event = new Login($login, $password);

        event($event);

        return ['result' => $event->result()];
    }

    /**
     * @param $name
     * @param $lastname
     * @param $number
     * @param $email
     * @param $password
     * @param $password_confirmation
     * @return array
     */
    public function registration($name, $lastname, $number, $email, $password, $password_confirmation): array
    {
        $event = new Register($name, $lastname, $number, $email, $password, $password_confirmation);

        event($event);

        return ['result' => $event->result()];
    }
}
