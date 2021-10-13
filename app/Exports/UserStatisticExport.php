<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class StatisticExport.
 */
class UserStatisticExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            [
                'Имя',
                'Фамилия',
                'Таб. номер',
                'Почта',
                'Времени онлайн / Минут',
                'Зарегистрирован',
                'Количество отчетов',
                'Подписчиков',
                'Подписан',
                'Поставил лайков',
            ],
        ];

        /** @var User[] $users */
        $users = User::orderByDesc('id')
            ->where('logins', '!=', '0')
            ->withCount(['taskReports' => fn ($q) => $q->where('status', TaskReport::STATUS_CHECKED)])
            ->withCount('subscribers')
            ->withCount('subscriptions')
            ->withCount('commentaryLikes')
            ->withCount('taskReportLikes')
            ->get();

        foreach ($users as $user) {
            $result[] = [
                $user->name,
                $user->lastname,
                $user->number,
                $user->email,
                $user->seconds ? $user->seconds / 120 : 0,
                $user->logins ? 'Да' : 'Нет',
                $user->task_reports_count,
                $user->subscribers_count,
                $user->subscriptions_count,
                $user->commentary_likes_count + $user->task_report_likes_count,
            ];
        }

        return collect($result);
    }
}
