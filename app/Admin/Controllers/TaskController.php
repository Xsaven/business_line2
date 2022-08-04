<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\Task;
use LteAdmin\Page;

/**
 * TaskController Class.
 * @method Task model()
 */
class TaskController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Task::class;

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
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->input_name('Название'),
                    $searchForm->select_report_type('Тип')->options(Task::REPORT_TYPES),
                )
            ),
            $card->statisticBody(
                $modelTable->col_name('Название')->sort(),
                $modelTable->col('Тип события', fn (Task $task) => Task::EVENT_TYPES[$task->event_type])->sort('event_type'),
                $modelTable->col('Тип отчёта', fn (Task $task) => Task::REPORT_TYPES[$task->report_type])->sort('report_type'),
                $modelTable->col('Стоимость', 'cost')->sort()->money('баллов'),
                $modelTable->col('Fans Task', 'fans_task')->sort()->yes_no(),
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
                    $tab->ifEdit()->info('direction_name', 'Направление')
                        ->value($this->model()?->direction?->name),
                    $tab->input('name', 'Название')->required(),

                    $tab->select('action_type', 'Тип подтверждения')
                        ->options(Task::ACTION_TYPES, true),

                    $tab->select('event_type', 'Тип события')
                        ->options(Task::EVENT_TYPES, true),

                    $tab->select('report_type', 'Тип отчёта')
                        ->options(Task::REPORT_TYPES, true),

                    $tab->watch(
                        $this->isModelInput('report_type', Task::REPORT_TYPE_DOWNLOAD_FILE)
                        || $this->isModelInput('report_type', Task::REPORT_TYPE_DOWNLOAD_FILE_PHOTO),
                        $tab->input('report_configs[download]', 'Ссылка для скачивания')->vertical()
                    ),

                    $tab->multi_select('action_types', 'Проверка задания')
                        ->options(Task::ACTION_TYPES, true),
                    $tab->numeric('cost', 'Стоимость')->required()
                        ->icon_dollar_sign(),

                    $tab->select('welcome_type', 'Тип приветствия')
                        ->options(Task::WELCOME_TYPE)
                        ->required(),

                    $tab->input('welcome_video', 'Видео код приветствия')
                        ->icon_video(),

                    $tab->input('welcome_banner', 'Банер приветствия'),

                    $tab->ckeditor('short_description', 'Описание'),
                    $tab->ckeditor('terms_of_participation', 'Условия участия'),

                    $tab->switcher('fans_task', 'Fans Task')
                        ->info('Специальная форма для болельщиков.'),

                    $tab->divider('Дата и время'),
                    $tab->date_time('start_at', 'Начало')->required(),
                    $tab->date_time('finish_at', 'Конец')->required(),
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
                    $modelInfoTable->row_name('Название'),
                    $modelInfoTable->row('Тип события', fn (Task $task) => Task::EVENT_TYPES[$task->event_type]),
                    $modelInfoTable->row('Тип отчёта', fn (Task $task) => Task::REPORT_TYPES[$task->report_type]),
                    $modelInfoTable->row('Условия участия', 'terms_of_participation'),
                    $modelInfoTable->row('Стоимость', 'cost')->money('баллов'),
                ),
            )
        );
    }
}
