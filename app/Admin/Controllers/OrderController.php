<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Exports\OrdersExport;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Lar\Layout\Respond;
use LteAdmin\Page;

/**
 * OrderController Class.
 * @method Order model()
 */
class OrderController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Order::class;

    /**
     * @param $type
     * @return bool
     */
    public function defaultTools($type): bool
    {
        return $type !== 'add';
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @param  Buttons  $buttons
     * @return Page
     */
    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable,
        Buttons $buttons,
    ): Page {
        return $page->card(
            $card->buttons(
                $buttons->success('fas fa-download')
                    ->text('Скачать заказы')
                    ->click(
                        fn (Respond $respond)
                        => $respond->redirect(route('orders_export'))
                    ),
            ),
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->inDefault(
                        $searchForm->in_select_user_id('Пользователь')
                            ->load(User::class),
                        $searchForm->in_select_status('Статус')
                            ->options(Order::STATUSES),
                        $searchForm->in_input_user_id('Имя пользователя', function ($builder, $val) {
                            return $this->model()->whereHas('user', function ($q) use ($val) {
                                return $q->where('name', 'like', "%{$val}%");
                            });
                        }),
                        $searchForm->in_input_user_id( 'Фамилия пользователя', function ($builder, $val) {
                            return $this->model()->whereHas('user', function ($q) use ($val) {
                                return $q->where('lastname', 'like', "%{$val}%");
                            });
                        })
                    )
                )
            ),
            $card->statisticBody(
                $modelTable->col_user__name('Пользователь')->admin_resource_route('users')->sort('user_id'),
                $modelTable->col_phone('Телефон')->sort(),
                $modelTable->col_email('Почта')->sort(),
                $modelTable->col_delivery__address('Адрес')->sort('delivery_id'),
                $modelTable->col('Статус', fn (Order $order) => Order::STATUSES[$order->status])->sort('status')->badge(),
            ),
        );
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  Form  $form
     * @param  Tab  $tab
     * @return Page
     */
    public function matrix(
        Page $page,
        Card $card,
        Form $form,
        Tab $tab
    ): Page {

        return $page->card(
            $card->form(
                $form->tabGeneral(
                    $tab->select_status('Статус')->options(Order::STATUSES),
                    $tab->select_delivery_id('Адрес')->load(Delivery::class, 'id:address'),
                    $tab->input_phone('Телефон'),
                    $tab->input_email('Почта'),
                ),
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  ModelInfoTable  $modelInfoTable
     * @param  ModelTable  $modelTable
     * @return Page
     */
    public function show(
        Page $page,
        Card $card,
        ModelInfoTable $modelInfoTable,
        ModelTable $modelTable
    ): Page {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->rowDefault(
                    $modelInfoTable->row_name('Название'),
                    $modelInfoTable->row_title('Заголовок'),
                ),
            )
        )->card(
            $card->title('Товар'),
            $card->model_table(
                $modelTable->model(lte_model()->products()),
                $modelTable->colDefault(
                    $modelTable->col('Изображение', 'src')->sort()->avatar(50),
                    $modelTable->col('Название', 'name')->sort(),
                    $modelTable->col('Стоимость', 'cost')->sort()->money('баллов'),
                    $modelTable->col('Свойство', function (Product $product) {
                        if ($product->setting->slug == 'color') {
                            return ModelTable::callExtension('color_cube', [$product->pivot->value]);
                        }
                        return $product->pivot->value;
                    }),
                )
            )
        );
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
