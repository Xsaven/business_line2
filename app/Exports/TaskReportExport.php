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
            ['Задание', 'Имя', 'Фамилия', 'Таб. номер', 'Комментариев', 'Лайков'],
        ];

        /** @var TaskReport[] $reports */
        $reports = TaskReport::with('user', 'task')
            ->withCount('commentary', 'likes')
            ->where('status', TaskReport::STATUS_CHECKED)
            ->get();

        foreach ($reports as $report) {
            $result[] = [
                $report->task->name,
                $report->user->name,
                $report->user->lastname,
                $report->user->number,
                $report->commentary_count.' ',
                $report->likes_count.' ',
            ];
        }

        return collect($result);
    }
}
