<?php

namespace App\LteAdmin\Jax;

use App\Events\Ws\Exec;
use App\Models\User;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * UserControl Class.
 */
class UserControl extends LteAdminExecutor
{
    public function auth(int $id)
    {
        if ($user = User::find($id)) {
            \Auth::login($user);

            $this->toast_success("Вы успешно авторизовались пользователем {$user->email}!");
        }
    }

    public function logout(int $id)
    {
        $user = User::find($id);

        if ($user) {
            \Cache::forget('n:user:session:'.$user->id);

            Exec::dispatch($user->id, ['doc::location' => '/logout']);

            \Cache::forget('n:user:session:'.$user->id);

            $user->update([
                'session' => null,
            ]);

            $this->reload();
        }
    }
}
