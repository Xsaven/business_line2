<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class TaskReportExport.
 */
class TaskReportExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            ['Трек', 'Задание', 'Имя', 'Фамилия', 'Таб. номер', 'Комментариев', 'Лайков', 'Дата', 'Профиль', 'Админ', 'Баллов'],
        ];

        /** @var TaskReport[] $reports */
        $reports = TaskReport::with('user', 'task')
            ->withCount('commentary', 'likes')
            ->whereHas('task', fn ($q) => $q->whereHas('direction'))
            ->where('status', TaskReport::STATUS_CHECKED)
            ->get();

        foreach ($reports as $report) {
            $result[] = [
                $report->task->direction->name,
                $report->task->name,
                $report->user->name,
                $report->user->lastname,
                $report->user->number,
                $report->commentary_count.' ',
                $report->likes_count.' ',
                $report->created_at->toDateTimeString(),
                asset("user/{$report->user_id}"),
                asset("lte/task_report/{$report->id}"),
                $report->cost,
            ];
        }

        return collect($result);
    }
}
