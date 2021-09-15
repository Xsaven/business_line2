<?php

namespace App\LteAdmin\Controllers;

use App\LteAdmin\Modals\AddBalanceModal;
use App\Models\TaskReport;
use App\Models\User;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelTable;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use App\Models\Notification;

/**
 * NotificationsController Class
 * @package App\LteAdmin\Controllers
 */
class NotificationsController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = Notification::class;

    /**
     * @return Sheet
     */
    public function index()
    {

        return Sheet::create(function (ModelTable $table) {

            $table->model(['notifiable_type' => User::class]);

            $table->search->id();
            $table->search->input('data', 'Сообщение', '%=%');
            $table->search->at();

            $table->id();
            $table->col('Пользователь', function (Notification $notification) {
                return User::find($notification->notifiable_id)->full_name;
            });
            $table->col('Сообщение', 'data.message');
            $table->at();
            $table->col(function (Notification $notification) {
                return ButtonGroup::create(function (ButtonGroup $group) use ($notification) {
                    $group->primary(['fas fa-money'])->setTitle('Баланс пользователя')
                        ->on_click(new AddBalanceModal(['user_id' => $notification->notifiable_id]));
                });
            });
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {

        return new Matrix(function (Form $form) {
            $form->info_id();
            $form->autoMake();
            $form->info_at();
        });
    }

    /**
     * @return Info
     */
    public function show()
    {

        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->at();
        });
    }

}
