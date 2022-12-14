<?php

namespace App\Admin\Jax;

use App\Events\Ws\Exec;
use App\Jobs\AdminStatisticJob;
use App\Models\User;
use LteAdmin\Jax\LteAdminExecutor;

/**
 * UserControl Class.
 */
class UserControl extends LteAdminExecutor
{
    public function reset_password(int $id)
    {
        if ($user = User::find($id)) {
            $user->update(['password' => 'none']);

            AdminStatisticJob::dispatch();

            if (false) {
                Exec::dispatch($user->id, 'v-layout:logout');
            }

            $this->toast_success("Пользователь {$user->email} сброшен!");
        }
    }

    public function auth(int $id)
    {
        if ($user = User::find($id)) {
            \Auth::login($user);

            \Auth::user()->increment('logins');

            AdminStatisticJob::dispatch();

            $this->toast_success("Вы успешно авторизовались пользователем {$user->email}!");
        }
    }

    public function logout(int $id)
    {
        $user = User::find($id);

        if ($user) {
            \Cache::forget('n:user:session:'.$user->id);

            if (false) {
                Exec::dispatch($user->id, 'v-layout:logout');
            }

            \Cache::forget('n:user:session:'.$user->id);

            $user->update([
                'session' => null,
            ]);

            $this->reload();
        }
    }
}
