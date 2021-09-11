<?php

namespace App\LteAdmin\Controllers;

use App\Events\Ws\Exec;
use App\Exports\CommentariesExport;
use App\Exports\UserStatisticExport;
use App\LteAdmin\Modals\AddBalanceModal;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Position;
use App\Models\Task;
use App\Models\User;
use Lar\LteAdmin\Core\ModelSaver;
use Lar\LteAdmin\Segments\Container;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table, Card $card) {
            $card->group(function (ButtonGroup $group) {
                $group->success(['fas fa-download', 'Скачать пользователей'])
                    ->on_click('doc::redirect', route('users_export'));
            });

            $table->orderBy('id', 'desc');

            $table->search->id();
            $table->search->input('name', 'Имя');
            $table->search->input('lastname', 'Фамилия');
            $table->search->input('login', 'Логин');
            $table->search->input('email', 'Email');
            $table->search->input('number', 'Табельный номер');
            $table->search->at();

            $table->id();
            $table->col('Имя', 'name')->sort()->copied();
            $table->col('Фамилия', 'lastname')->sort()->copied();
            $table->col('Email', 'email')->sort()->copied();
            $table->col('Баланс', 'balance')->sort()->badge_number();
            $table->col('В системе', 'logins')->sort()->yes_no()->info('Уже зарегистрирован');
            $table->col('lte.active', 'active')->input_switcher('Да', 'Нет')->sort();
            $table->col('Комментарии', 'active_commentaries')->input_switcher('Да', 'Нет')->sort()
                ->info('Без модерации');
            $table->at();
            $table->col(function (User $user) {
                return ButtonGroup::create(function (ButtonGroup $group) use ($user) {
                    $group->primary(['fas fa-money'])->setTitle('Пополнить баланс')
                        ->on_click(new AddBalanceModal(['user_id' => $user->id]));
                    $group->success(['fas fa-user-lock'])
                        ->setTitle('Авторизоваться этим пользователем')
                        ->on_click('jax.user_control.auth', $user->id);

                    $group->danger(['fas fa-ban'])
                        ->setTitle('Завершить сеанс пользователя')
                        ->on_click('jax.user_control.logout', $user->id);

                    $group->danger(['fas fa-key'])
                        ->setTitle('Сбросить регистрацию')
                        ->on_click('jax.user_control.reset_password', $user->id);
                });
            });
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return new Matrix(function (Form $form, Card $card) {
            $card->group()->primary(['fas fa-money', 'Пополнить баланс'])
                ->on_click(new AddBalanceModal(['user_id' => $this->model()->id]));
            $form->info_id();
            if ($this->isType('edit')) {
                $form->info('balance', 'Баланс');
                $form->info('session', 'ID Сессии');
                $form->info('seconds', 'Минут онлайн')
                    ->value(number_format($this->model()->seconds ? $this->model()->seconds / 60 : 0, 2));
                $form->info('logins', 'Авторизаций');
            }
            $form->input('photo', 'Фото');
            $form->input('number', 'Табельный номер')->required();
            $form->input('name', 'Имя')->required();
            $form->input('lastname', 'Фамилия');
            $form->input('login', 'Логин')
                ->required()->slugable()
                ->unique_if($this->isType('create'), 'users', 'login')
                ->unique_if($this->isType('edit'), 'users', 'login', $this->model()->login, 'login');
            $form->email('email', 'Email')
                ->nullable()
                ->unique_if($this->isType('create'), 'users', 'email')
                ->unique_if($this->isType('edit'), 'users', 'email', $this->model()->email, 'email');

            $form->select('direction_id', Direction::TITLE)
                ->load(Direction::class)
                ->nullable();

            $form->select('position_id', 'Должность')
                ->load(Position::class)
                ->nullable();

            $form->select('division_id', 'Подразделение')
                ->load(Division::class)
                ->nullable();

            $form->multi_select('subscriptions[]', 'Подписки')
                ->load($this->isType('edit') ? User::where('id', '!=', $this->model()->id) : User::class);

            $form->multi_select('subscribers[]', 'Подписчики')
                ->load($this->isType('edit') ? User::where('id', '!=', $this->model()->id) : User::class);

            $form->multi_select('tracks[]', 'Треки')
                ->load(Task::class);

            $form->textarea('about', 'О пользователе')->rows(6);

            $form->date('birthday_at', 'День рождения');

            $form->switcher('active_commentaries', 'Комментарии')
                ->info('Может ли оставлять комментарии без модерации')
                ->default(0)->labels('Да', 'Нет');

            $form->switcher('active', 'lte.active')->default(1);

            if ($this->isType('edit')) {
                $form->hr();
                $form->password('password', 'Пароль')
                    ->min(6)->nullable()->default('')
                    ->confirm();
                $form->hr();
                $form->info('updated_at', 'lte.updated_at');
                $form->info('created_at', 'lte.created_at');
            }

            ModelSaver::on_created(function (array $array, User $user) {
                Exec::dispatch($user->id, 'update');
            });

            ModelSaver::on_update(function (array $array, User $user) {
                Exec::dispatch($user->id, 'update');
            });
        });
    }

    /**
     * @return Info|Container
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->row('Name', 'name')->copied();
            $table->row('Email', 'email')->copied();
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
        return \Excel::download(new UserStatisticExport(), 'All users, '.(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }
}
