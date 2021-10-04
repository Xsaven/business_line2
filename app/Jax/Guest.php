<?php

namespace App\Jax;

use App\Events\Login;
use App\Events\Register;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
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

        $sid = session()->getId();
        $key = "login_count_{$sid}";

        return ['result' => $event->result(), 'count' => (int) \Cache::get($key, 0)];
    }

    /**
     * @param $name
     * @param $lastname
     * @param $number
     * @param $email
     * @param $email_confirmation
     * @param $password
     * @param $password_confirmation
     * @return array
     */
    public function registration($name, $lastname, $number, $email, $email_confirmation, $password, $password_confirmation): array
    {
        $event = new Register($name, $lastname, $number, $email, $password, $password_confirmation);

        event($event);

        return ['result' => $event->result()];
    }

    /**
     * @param  string  $name
     * @param  string  $lastname
     * @param  string  $number
     * @return array
     */
    public function registration_data(string $name, string $lastname, string $number): array
    {
        $result = app(UserRepository::class)
            ->model()
            //->where('password', 'none')
            ->where('name', $name)
            ->where('lastname', $lastname)
            ->where('number', $number)
            ->first();

        return ['email' => $result?->email, 'has' => (bool) $result, 'registered' => $result && $result->password !== 'none'];
    }
}
