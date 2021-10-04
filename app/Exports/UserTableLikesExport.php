<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class StatisticExport.
 */
class UserTableLikesExport implements FromCollection
{
    public static $direction_id;

    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            ['Место', 'Имя', 'Фамилия', 'Таб. номер', 'Лайков'],
        ];

        /** @var User[] $users */
        $users = User::where('direction_id', static::$direction_id)
            ->orderByDesc('likes')
            ->orderBy('name', 'ASC')
            ->orderBy('lastname', 'ASC')
            ->get();

        foreach ($users as $key => $user) {
            $result[] = [
                $key + 1,
                $user->name,
                $user->lastname,
                $user->number,
                $user->likes,
            ];
        }

        return collect($result);
    }
}
