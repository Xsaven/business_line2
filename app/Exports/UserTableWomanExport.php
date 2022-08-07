<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class StatisticExport.
 */
class UserTableWomanExport implements FromCollection
{
    public static $direction_id;

    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            ['Место', 'Имя', 'Фамилия', 'Таб. номер', 'Баллов'],
        ];

        /** @var User[] $users */
        $users = User::where('direction_id', static::$direction_id)
            ->orderByDesc('max_balance')
            ->whereActive(1)
            ->where('sex', 0)
            ->orderBy('name', 'ASC')
            ->orderBy('lastname', 'ASC')
            ->get();

        foreach ($users as $key => $user) {
            $result[] = [
                $key + 1,
                $user->name,
                $user->lastname,
                $user->number,
                $user->max_balance,
            ];
        }

        return collect($result);
    }
}
