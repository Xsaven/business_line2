<?php

namespace App\LteAdmin\Controllers;

use App\Models\Task;
use App\Models\Track;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelLive;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('name', 'Название');
            $table->search->select('report_type', 'Тип')
                ->options(Task::REPORT_TYPES);
            $table->search->at();

            $table->id();
            $table->col('Приз', 'prize_src')->sort()->avatar(50);
            $table->col('Название', 'name')->sort();
            $table->col('Тип события', fn (Task $task) => Task::EVENT_TYPES[$task->event_type])->sort('event_type');
            $table->col('Тип отчёта', fn (Task $task) => Task::REPORT_TYPES[$task->report_type])->sort('report_type');
            $table->col('Стоимость', 'cost')->sort()->money('баллов');
            $table->col('Fans Task', 'fans_task')->sort()->yes_no();
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
            if ($this->isType('edit')) {
                $form->info('direction_name', 'Направление')
                    ->value($this->model()?->direction?->name);
            }
            $form->input('name', 'Название')->required();
            $form->input('prize_src', 'Фото приза')
                ->required_condition($this->isType('create'));

            $form->select('action_type', 'Тип подтверждения')
                ->options(Task::ACTION_TYPES, true);

            $form->select('event_type', 'Тип события')
                ->options(Task::EVENT_TYPES, true);

            $form->select('report_type', 'Тип отчёта')
                ->options(Task::REPORT_TYPES, true);

            $form->model_live('report_type', ModelLive::IN(Task::REPORT_TYPE_DOWNLOAD_FILE, Task::REPORT_TYPE_DOWNLOAD_FILE_PHOTO), function (ModelLive $live) {
                $live->input('report_configs[download]', 'Ссылка для скачивания');
            });
            $form->multi_select('action_types', 'Проверка задания')
                ->options(Task::ACTION_TYPES, true);
            $form->numeric('cost', 'Стоимость')->required()
                ->icon_dollar_sign();

            $form->select('welcome_type', 'Тип приветствия')
                ->options(Task::WELCOME_TYPE)
                ->required();

            $form->input('welcome_video', 'Видео код приветствия')
                ->icon_video();

            $form->input('welcome_banner', 'Банер приветствия');

            $form->ckeditor('short_description', 'Описание');
            $form->ckeditor('terms_of_participation', 'Условия участия');

            $form->switcher('fans_task', 'Fans Task')
                ->info('Специальная форма для болельщиков.');

            $form->divider('Дата и время');
            $form->date_time('start_at', 'Начало')->required();
            $form->date_time('finish_at', 'Конец')->required();
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
            $table->row('Приз', 'prize_src')->avatar(200);
            $table->row('Название', 'name');
            $table->row('Тип события', fn (Task $task) => Task::EVENT_TYPES[$task->event_type]);
            $table->row('Тип отчёта', fn (Task $task) => Task::REPORT_TYPES[$task->report_type]);
            $table->row('Условия участия', 'terms_of_participation');
            $table->row('Стоимость', 'cost')->money('баллов');
            $table->at();
        });
    }
}
