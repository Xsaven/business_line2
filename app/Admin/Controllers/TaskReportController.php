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
use App\Events\AddUserBalance;
use App\Exports\TaskReportExport;
use App\Models\Division;
use App\Models\Position;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\AdminApproveTaskReportNotification;
use App\Notifications\AdminDropTaskReportNotification;
use Lar\Layout\Respond;
use Lar\Layout\Tags\DIV;
use LteAdmin\Core\ModelSaver;
use LteAdmin\Page;
use LteAdminOld\Modals\AddBalanceModal;

/**
 * TaskReportController Class.
 * @package App\LteAdmin\Controllers
 * @method TaskReport model()
 */
class TaskReportController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = TaskReport::class;

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
                $buttons->success(['fas fa-download', 'Скачать выполненные отчёты'])
                    ->on_click('doc::redirect', route('task_report_export'))
            ),
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->select('task_id', 'Задание')
                        ->load(Task::class),
                    $searchForm->select('user_id', 'Пользователь')
                        ->load(User::class, 'id:name:lastname'),
                    $searchForm->numeric('cost', 'Зачислено'),
                )
            ),
            $card->statisticBody(
                $modelTable->col('Тип', fn (TaskReport $report) => Task::REPORT_TYPES[$report->task->report_type]),
                $modelTable->col('Пользователь', 'user.full_name')->admin_resource_route_show('users')->sort('user_id'),
                $modelTable->col('Задание', 'task.name')->admin_resource_route_show('task')->sort('task_id'),
                $modelTable->col('Статус', fn (TaskReport $report) => TaskReport::STATUSES[$report->status])->sort('status'),
                $modelTable->col('Коммент', 'comment')->str_limit(50),
                $modelTable->col('Зачислено', 'cost')->badge_number(),
                $modelTable->buttons(
                    $buttons->success('fas fa-money')
                        ->setTitle('Пополнить баланс')
                        ->click(
                            fn (Respond $respond, int $user_id) => $respond->put('modal:put', [
                                'addBalance', compact('user_id')
                            ]), ['user_id']
                        ),
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

        $status_old = $this->model()->status;

        ModelSaver::on_updated(static::$model, function () use ($status_old) {
            $report = $this->model()->find($this->model()->id);
            //dd($report->status);
            if ($report->status === TaskReport::STATUS_CHECKED && $status_old === TaskReport::STATUS_CANCELED) {
                event(
                    new AddUserBalance(
                        $report->user_id, $report->task->cost, new AdminApproveTaskReportNotification($report->task)
                    )
                );
            } elseif ($report->status === TaskReport::STATUS_CANCELED && $status_old === TaskReport::STATUS_CHECKED) {
                event(
                    new AddUserBalance(
                        $report->user_id, -$report->task->cost, new AdminDropTaskReportNotification($report->task)
                    )
                );
            }
        });

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
                    $tab->ifEdit()->info('cost', 'Зачислено'),
                    $tab->select('task_id', 'Задание')->required()
                        ->load(Task::class),
                    $tab->select('user_id', 'Пользователь')->required()
                        ->load(User::class, 'id:name:lastname'),
                    $tab->select('status', 'Статус')->required()
                        ->options(TaskReport::STATUSES, true),
                    $tab->input('file', 'Файл'),
                    $tab->textarea('comment', 'Комментарий')->rows(6),
                    $tab->textarea('admin_comment', 'Комментарий администратора')->rows(3),
                    $tab->if($this->isType('edit') && $this->model()->task->fans_task)
                        ->select('fun_id', 'Болеет за')->nullable()
                        ->load(User::class),
                    $tab->date_time('updated_at', 'Обновлено в'),
                    $tab->date_time('created_at', 'Создано в'),
                ),
            ),
            $card->footer_form(),
        );
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
                    $modelInfoTable->row('Пользователь', 'user.full_name')->admin_resource_route_show('users'),
                    $modelInfoTable->row('Задание', 'task.name')->admin_resource_route_show('task'),
                    $modelInfoTable->row('Статус', fn (TaskReport $report) => TaskReport::STATUSES[$report->status]),
                    $modelInfoTable->row('Коммент', 'comment'),
                    $modelInfoTable->row('Файл', function (TaskReport $report) {
                        $fields = DIV::create();
                        if ($report->file && is_numeric($report->file)) {
                            $fields->text("<iframe src='https://player.vimeo.com/video/{$report->file}' width='100%' height='430' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>");
                        } elseif ($report->file && (str_ends_with($report->file, '.jpg') || str_ends_with($report->file, '.jpeg') || str_ends_with($report->file, '.png'))) {
                            $fields->text("<img src='{$report->file}' class='img-fluid' alt='{$report->file}'>");
                        }
                        return $fields;
                    }),
                ),
            )
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
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        return \Excel::download(new TaskReportExport(), 'Complete task reports, '.(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }
}
