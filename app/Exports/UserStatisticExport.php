<?php

namespace App\Exports;

use App\Models\Comment;
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
            ['Пользователь', 'Логин', 'Времени онлайн / Минут', 'Зарегистрирован'],
        ];

        /** @var User[] $users */
        $users = User::orderByDesc('id')
            ->where('logins', '!=', '0')
            ->get();

        foreach ($users as $user) {
            $result[] = [
                $user->name,
                $user->login,
                $user->seconds ? $user->seconds / 60 : 0,
                $user->logins ? 'Да' : 'Нет'
            ];
        }

        return collect($result);
    }
}
