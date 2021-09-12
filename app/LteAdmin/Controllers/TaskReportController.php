<?php

namespace App\LteAdmin\Controllers;

use App\Events\AddUserBalance;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\AdminApproveTaskReportNotification;
use Lar\Layout\Tags\DIV;
use Lar\LteAdmin\Core\ModelSaver;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Field;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->select('task_id', 'Задание')
                ->load(Task::class);
            $table->search->select('user_id', 'Пользователь')
                ->load(User::class);
            $table->search->at();

            $table->id();
            $table->col('Тип', fn (TaskReport $report) => Task::REPORT_TYPES[$report->task->report_type]);
            $table->col('Пользователь', 'user.full_name')->admin_resource_route_show('users')->sort('user_id');
            $table->col('Задание', 'task.name')->admin_resource_route_show('task')->sort('task_id');
            $table->col('Статус', fn (TaskReport $report) => TaskReport::STATUSES[$report->status])->sort('status');
            $table->col('Коммент', 'comment')->str_limit(50);
            $table->at();
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        $status_old = $this->model()->status;

        return new Matrix(function (Form $form) use ($status_old) {
            $form->info_id();
            $form->select('task_id', 'Задание')->required()
                ->load(Task::class);
            $form->select('user_id', 'Пользователь')->required()
                ->load(User::class);
            $form->select('status', 'Статус')->required()
                ->options(TaskReport::STATUSES, true);
            $form->input('file', 'Файл');
            $form->textarea('comment', 'Комментарий');
            if ($this->isType('edit') && $this->model()->task->fans_task) {
                $form->select('fun_id', 'Болеет за')->nullable()
                    ->load(User::class);
            }
            $form->info_at();
            ModelSaver::on_updated(static::$model, function () use ($status_old) {
                $report = $this->model()->find($this->model()->id);
                if ($report->status === TaskReport::STATUS_CHECKED && $status_old === TaskReport::STATUS_CANCELED) {
                    event(
                        new AddUserBalance(
                            $report->user_id, $report->task->cost, new AdminApproveTaskReportNotification($report->task)
                        )
                    );
                }
            });
        });
    }

    /**
     * @return Info
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->row('Пользователь', 'user.full_name')->admin_resource_route_show('users');
            $table->row('Задание', 'task.name')->admin_resource_route_show('task');
            $table->row('Статус', fn (TaskReport $report) => TaskReport::STATUSES[$report->status]);
            $table->row('Коммент', 'comment');
            $table->row('Файл', function (TaskReport $report) {
                $fields = DIV::create();
                if ($report->file && is_numeric($report->file)) {
                    $fields->text("<iframe src='https://player.vimeo.com/video/{$report->file}' width='100%' height='430' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>");
                } elseif ($report->file && str_ends_with($report->file, '.jpg')) {
                    $fields->text("<img src='{$report->file}' class='img-fluid' alt='{$report->file}'>");
                }

                return $fields;
            });
            $table->at();
        });
    }
}