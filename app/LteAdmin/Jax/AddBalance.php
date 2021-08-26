<?php

namespace App\LteAdmin\Jax;

use App\Events\AddUserBalance;
use App\Models\User;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * AddBalance Class.
 * @package App\LteAdmin\Jax
 */
class AddBalance extends LteAdminExecutor
{
    /**
     * @param $user_id
     * @param $modal
     * @param int $balance
     */
    public function balance($user_id, $modal, int $balance)
    {
        event(new AddUserBalance($user_id, $balance));

        $this->put('modal:hide', $modal)
            ->toast_success('Баланс успешно пополнен!')
            ->time_out(700)->reload();
    }
}
