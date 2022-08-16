<?php

namespace App\Admin\Controllers;

use App\Admin\Components\Vue\Commentaries;
use App\Admin\Components\Vue\Questions;
use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\Modal;
use App\Admin\Delegates\ModalBody;
use App\Jobs\AdminStatisticJob;
use App\Models\Online;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use Lar\Layout\Tags\SPAN;
use LteAdmin\Components\GridColumnComponent;
use LteAdmin\Delegates\Card;
use LteAdmin\Delegates\CardBody;
use LteAdmin\Delegates\ChartJs;
use LteAdmin\Delegates\SearchForm;
use LteAdmin\Delegates\StatisticPeriod;
use LteAdmin\Page;
use LteAdmin\Controllers\DashboardController as AdminDashboardController;

class DashboardController extends AdminDashboardController
{
    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  CardBody  $cardBody
     * @param  StatisticPeriod  $statisticPeriod
     * @param  ChartJs  $chartJs
     * @param  SearchForm  $searchForm
     * @return Page|mixed
     */
    public function index(
        Page $page,
        Card $card,
        CardBody $cardBody,
        StatisticPeriod $statisticPeriod,
        ChartJs $chartJs,
        SearchForm $searchForm,
    ) {
        if (! \Cache::has('online')) {
            AdminStatisticJob::dispatch();
        }

        $online = \Cache::get('online', 0);

        $onlinePeck = Online::orderByDesc('peck')->first();

        return $page->modal([$this, 'taskReportModal'])->card(
            $card->title('Статистика'),
            $card->card_body(
                $cardBody->row(
                    $this->row->column()->info_box(
                        'Регистраций',
                        SPAN::create(['total_user_count'], User::where('logins', '!=', '0')->count().' '),
                        'fas fa-users'
                    )->warningType(),
                    $this->row->column()->info_box(
                        'OnLine ',
                        SPAN::create(['total_online_count'], $online.' '),
                        'fas fa-signal'
                    )->primaryType(),
                    $this->row->column()->info_box(
                        'Пиковый OnLine',
                        SPAN::create(['total_online_peck_count'], ($onlinePeck ? $onlinePeck->peck : 0).' '),
                        'fas fa-chart-line'
                    )->infoType(),
                ),
            )
        )->when(admin()->isRootAdmin(), function (Page $page) {
            $page->next()->row(
                $this->cardTableVueCol('Задания', Questions::create()),
                $this->cardTableVueCol('Комментарии', Commentaries::create()),
            );
        })->when(admin()->isRoot(), function (Page $page) {
            $page->next()->row(
                $this->cardTableCol('lte.environment', [$this, 'environmentInfo']),
                $this->cardTableCol('Laravel', [$this, 'laravelInfo']),
                $this->cardTableCol('Composer', [$this, 'composerInfo']),
                $this->cardTableCol('lte.database', [$this, 'databaseInfo']),
            );
        });
    }

    /**
     * @param  string  $title
     * @param $data
     * @return GridColumnComponent
     */
    public function cardTableVueCol(string $title, $data)
    {
        return $this->row->w100()->pl2()->column(
            $this->column->num(6)
                ->m0()
                ->p2()
                ->mb4()
                ->card()
                ->title($title)
                ->h100()
                ->w100()
                ->full_body(['table-responsive'])
                ->appEnd($data)
        );
    }

    /**
     * @param  Modal  $modal
     * @param  Form  $form
     * @param  Buttons  $buttons
     * @param  ModalBody  $modalBody
     * @return array
     */
    public function taskReportModal(
        Modal $modal, Form $form, Buttons $buttons, ModalBody $modalBody,
    ): array {

        if ($this->isModelInput('report_id')) {
            $modal_id = $this->request('_modal_id');
            $report_id = $this->request('report_id');
            $report = TaskReport::find($report_id);
            $task = $report->task;

            return [
                $modal->name('taskReport')->temporary()->sizeBig(),
                $modal->title(Task::REPORT_TYPES[$task->report_type].' #'.$report_id),
                $modal->modal_body(
                    $modalBody->if($task)->divider($task->name),
                    $modalBody->if($task)->text($task->terms_of_participation),
                    $modalBody->if($report->comment)->divider('Комментарий'),
                    $modalBody->if($report->comment)->text($report->comment),
                    $modalBody->if($report->file && is_numeric($report->file))->divider('Видео'),
                    $modalBody->if($report->file && is_numeric($report->file))->text("<iframe src='https://player.vimeo.com/video/{$report->file}' width='100%' height='430' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>"),
                    $modalBody->if($report->file && (str_ends_with($report->file, '.jpg') || str_ends_with($report->file, '.jpeg') || str_ends_with($report->file, '.png')))->divider('Фото'),
                    $modalBody->if($report->file && (str_ends_with($report->file, '.jpg') || str_ends_with($report->file, '.jpeg') || str_ends_with($report->file, '.png')))->text("<img src='{$report->file}' class='img-fluid' alt='{$report->file}'>"),
                    $modalBody->form(
                        $form->divider('Баллы'),
                        $form->numeric('add_to_balance', '')->value($task->cost)->icon_dollar_sign(),
                        $form->divider('Комментарий'),
                        $form->textarea('admin_comment', '')->rows(3),
                    )
                ),
                $modal->buttons(
                    $buttons->primary()->title('Закрыть окно')->modalDestroy(),
                    $buttons->danger()->title('Отклонить')->on_click('questions:drop', [$report_id, $modal_id]),
                    $buttons->success()->title('Одобрить')->on_click('questions:approve', [$report_id, $modal_id])
                )
            ];
        }

        return [];
    }
}
