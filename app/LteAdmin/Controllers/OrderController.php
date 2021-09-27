<?php

namespace App\LteAdmin\Controllers;

use App\Exports\OrdersExport;
use App\Exports\UserStatisticExport;
use App\Models\Order;
use App\Models\User;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * OrderController Class.
 */
class OrderController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Order::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table, Card $card) {
            $card->group(function (ButtonGroup $group) {
                $group->success(['fas fa-download', 'Скачать заказы'])
                    ->on_click('doc::redirect', route('orders_export'));
            });
            $card->defaultTools(fn ($t) => $t !== 'add');
            $table->search->id();
            $table->search->select('user_id', 'Пользователь')
                ->load(User::class);
            $table->search->select('status', 'Статус')
                ->options(Order::STATUSES);
            $table->search->at();

            $table->id();
            $table->col('Пользователь', 'user.name')->admin_resource_route('users')->sort('user_id');
            $table->col('Статус', fn (Order $order) => Order::STATUSES[$order->status])->sort('status');
            $table->col('Адрес', 'delivery.address');
            $table->at();
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return new Matrix(function (Form $form) {
            $form->info_id();
            $form->select('status', 'Статус')
                ->options(Order::STATUSES);
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
            $table->row('Пользователь', 'user.name')->admin_resource_route();
            $table->row('Статус', fn (Order $order) => Order::STATUSES[$order->status]);
            $table->at();
        });
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        return \Excel::download(new OrdersExport(), 'All orders, '.(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }
}
