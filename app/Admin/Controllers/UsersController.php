<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\Modal;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Exports\UserStatisticExport;
use App\Exports\UserTableWomanExport;
use App\Exports\UserTableManExport;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Position;
use App\Models\Task;
use App\Models\User;
use LteAdmin\Page;
use Lar\Layout\Respond;

/**
 * UsersController Class.
 * @method User model()
 */
class UsersController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = User::class;

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

        return $page
            ->modal([$this, 'addBalanceModal'])
            ->card(
                $card->buttons(
                    $buttons->success('fas fa-download')
                        ->text('Скачать пользователей')
                        ->click(
                            fn (Respond $respond)
                            => $respond->redirect(route('users_export')),
                        )
                ),
                $card->search_form(
                    $searchForm->inDefault(
                        $searchForm->in_input_name('Имя'),
                        $searchForm->in_input_lastname('Фамилия'),
                        $searchForm->in_input_login('Логин'),
                        $searchForm->in_input_email('Email'),
                        $searchForm->in_input_number('Табельный номер'),
                    )
                ),
                $card->statisticBody(
                    $modelTable->col('Имя', 'name')->sort()->copied(),
                    $modelTable->col('Фамилия', 'lastname')->sort()->copied(),
                    $modelTable->col('Email', 'email')->sort()->copied(),
                    $modelTable->col('Баланс', 'balance')->sort()->badge_number(),
                    $modelTable->col('В системе', 'logins')->sort()->yes_no()->info('Уже зарегистрирован'),
                    $modelTable->col('lte.active', 'active')->input_switcher('Да', 'Нет')->sort(),
                    $modelTable->col('Комментарии', 'active_commentaries')->input_switcher('Да', 'Нет')->sort()
                        ->info('Без модерации'),
                    $modelTable->buttons(
                        $buttons->success('fas fa-money')
                            ->setTitle('Пополнить баланс')
                            ->click(
                                fn (Respond $respond, int $id) => $respond->put('modal:put', [
                                    'addBalance', compact('id')
                                ]), ['id']
                            ),
                        $buttons->success(['fas fa-user-lock'])
                            ->setTitle('Авторизоваться этим пользователем')
                            ->click(
                                fn (Respond $respond, int $id)
                                => $respond->put('jax.user_control.auth', $id), ['id']
                            ),
                        $buttons->danger(['fas fa-ban'])
                            ->setTitle('Завершить сеанс пользователя')
                            ->click(
                                fn (Respond $respond, int $id)
                                => $respond->put('jax.user_control.logout', $id), ['id']
                            ),
                        $buttons->danger(['fas fa-key'])
                            ->setTitle('Сбросить регистрацию')
                            ->click(
                                fn (Respond $respond, int $id)
                                => $respond->put('jax.user_control.reset_password', $id), ['id']
                            )
                    ),
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
            $card->ifEdit()->modal([$this, 'addBalanceModal']),
            $card->ifEdit()->buttons()->primary(['fas fa-money', 'Пополнить баланс'])
                ->click(
                    fn (Respond $respond, int $id) => $respond->put('modal:put', [
                        'addBalance', compact('id')
                    ]), ['id']
                ),
            $card->form(
                $form->tabGeneral(
                    $tab->input('photo', 'Фото'),
                    $tab->input('number', 'Табельный номер')->required(),
                    $tab->input('name', 'Имя')->required(),
                    $tab->input('lastname', 'Фамилия'),
                    $tab->input('login', 'Логин')
                        ->required()->slugable()
                        ->unique_if($this->isType('create'), 'users', 'login')
                        ->unique_if($this->isType('edit'), 'users', 'login', $this->model()->login, 'login'),
                    $tab->email('email', 'Email')
                        ->nullable()
                        ->unique_if($this->isType('create'), 'users', 'email')
                        ->unique_if($this->isType('edit'), 'users', 'email', $this->model()->email, 'email'),

                    $tab->select('position_id', 'Должность')
                        ->load(Position::class)
                        ->nullable(),

                    $tab->select('division_id', 'Подразделение')
                        ->load(Division::class)
                        ->nullable(),

                    $tab->multi_select('tracks[]', 'Треки')
                        ->load(Task::class),

                    $tab->textarea('about', 'О пользователе')->rows(6),

                    $tab->date('birthday_at', 'День рождения'),
                ),
                $form->tab(
                    $tab->title('Settings')->icon_cogs(),
                    $tab->switcher('active_commentaries', 'Комментарии')
                        ->info('Может ли оставлять комментарии без модерации')
                        ->default(0)->labels('Да', 'Нет'),

                    $tab->switcher('sex', 'Пол')
                        ->default(0)
                        ->labels('Женщина', 'Мужчина'),

                    $tab->switcher('active', 'lte.active')->default(1),
                ),
                $form->ifEdit()->tab(
                    $tab->title('Information')->icon_info_circle(),
                    $tab->info('balance', 'Баланс'),
                    $tab->info('session', 'ID Сессии'),
                    $tab->info('seconds', 'Минут онлайн')
                        ->value(number_format($this->model()->seconds ? $this->model()->seconds / 60 : 0, 2)),
                    $tab->info('logins', 'Авторизаций'),
                ),
                $form->ifEdit()->tab(
                    $tab->title('Password')->icon_key(),
                    $tab->password('password', 'Пароль')
                        ->min(6)->nullable()->default('')
                        ->confirm()
                )
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param  Modal  $modal
     * @param  Form  $form
     * @param  Buttons  $buttons
     * @return array
     */
    public function addBalanceModal(Modal $modal, Form $form, Buttons $buttons): array
    {
        return [
            $modal->name('addBalance')->temporary()->closable(),
            $modal->title('Пополнения баланса для пользователя #'.$this->modelInput('id')),
            $modal->form(
                $form->input('balance', 'Сума пополнения')
                    ->mask('-{0,1}9{0,}')
                    ->vertical()
                    ->icon_hashtag()
                    ->queryable()
                    ->value('0')
            ),
            $modal->buttons(
                $buttons->danger()->title('Отмена')->modalDestroy(),
                $buttons->success()->title('Готово')->modalSubmit(),
            ),
            $modal->submitEvent(
                fn (Respond $respond) => $respond->put('addbalance', [
                    $this->modelInput('_modal_id'),
                    $this->modelInput('id'),
                ])
            )
        ];
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  ModelInfoTable  $modelInfoTable
     * @return Page
     */
    public function show(
        Page $page,
        Card $card,
        ModelInfoTable $modelInfoTable
    ): Page {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->rowDefault(
                    $modelInfoTable->row_name('Название')->copied(),
                    $modelInfoTable->row_email('Email')->copied(),
                ),
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
        return \Excel::download(new UserStatisticExport(), 'All users, '.(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_table_man(int $direction_id)
    {
        UserTableManExport::$direction_id = $direction_id;
        $direction = Direction::find($direction_id);

        return \Excel::download(new UserTableManExport(), "Man table ({$direction->name}), ".(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_table_woman(int $direction_id)
    {
        UserTableWomanExport::$direction_id = $direction_id;
        $direction = Direction::find($direction_id);

        return \Excel::download(new UserTableWomanExport(), "Woman table ({$direction->name}), ".(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }
}
