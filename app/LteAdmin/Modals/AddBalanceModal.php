<?php

namespace App\LteAdmin\Modals;

use Lar\LteAdmin\Segments\Modal;
use Lar\LteAdmin\Segments\Tagable\ModalBody;
use Lar\LteAdmin\Controllers\ModalController;

/**
 * AddBalanceModal Class
 * @package App\LteAdmin\Modals
 */
class AddBalanceModal extends ModalController
{
    /**
     * @param ModalBody $body
     * @param Modal $modal
     * @param int $user_id
     */
    public function create(ModalBody $body, Modal $modal,int $user_id)
    {
        $modal->temporary();

        $modal->title('Пополнения баланса');

        $body->numeric('balance','Сума пополнения')->vertical();

        $modal->btn('Отмена')->destroy()->danger();

        $modal->btn('Готово')->success()->ml2()
            ->on_click('addbalance', [request()->modal, $user_id]);
    }

}
