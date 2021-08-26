<?php

namespace App\LteAdmin\Jax;

use App\Models\User;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * AddBalance Class
 * @package App\LteAdmin\Jax
 */
class AddBalance extends LteAdminExecutor
{
    /**
     * @param $user_id
     * @param $modal
     * @param int $balance
     */
    public function balance($user_id,$modal,int $balance)
    {
        $user = User::find($user_id);

        $user->update([
            'balance' => $balance
        ]);

        $this->put('modal:hide', $modal)
            ->toast_success('Баланс успешно пополнен!')
            ->time_out(700)->reload();

    }
}
