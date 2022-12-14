<?php

namespace Admin\Modals;

use App\Models\Task;
use App\Models\TaskReport;


/**
 * TaskReportModal Class.
 * @package App\LteAdmin\Modals
 */
class TaskReportModal extends ModalController
{
    /**
     * @var string
     */
    protected $size = 'big';

    /**
     * @param  ModalBody  $body
     * @param  Modal  $modal
     * @param  int  $report_id
     * @return void
     */
    public function create(ModalBody $body, Modal $modal, int $report_id)
    {
        $modal->temporary();

        $report = TaskReport::find($report_id);

        $task = $report->task;

        $modal->title(Task::REPORT_TYPES[$task->report_type].' #'.$report_id);

        if ($task) {
            $body->divider($task->name);
            $body->text($task->terms_of_participation);
        }
        if ($report->comment) {
            $body->divider('Комментарий');
            $body->text($report->comment);
        }
        if ($report->file && is_numeric($report->file)) {
            $body->divider('Видео');
            $body->text("<iframe src='https://player.vimeo.com/video/{$report->file}' width='100%' height='430' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>");
        } elseif ($report->file && (str_ends_with($report->file, '.jpg') || str_ends_with($report->file, '.jpeg') || str_ends_with($report->file, '.png'))) {
            $body->divider('Фото');
            $body->text("<img src='{$report->file}' class='img-fluid' alt='{$report->file}'>");
        }

        $body->divider('Баллы');
        $body->numeric('add_to_balance', '')
            ->value($task->cost)->icon_dollar_sign();

        $body->divider('Комментарий');
        $body->textarea('admin_comment', '')
            ->rows(3);

        $modal->left_btn('Закрыть окно')->destroy()->primary();

        $modal->btn('Отклонить')->danger()->ml2()
            ->on_click('questions:drop', [$report_id, request()->modal]);

        $modal->btn('Одобрить')->success()->ml2()
            ->on_click('questions:approve', [$report_id, request()->modal]);
    }
}
