<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\Commentary;
use App\Models\TaskReport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class CommentariesExport.
 */
class CommentariesExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            ['Имя', 'Фамилия', 'Таб. номер', 'Дата', 'Комментарий'],
        ];

        $comments = Commentary::whereActive(1)
            ->with('user')
            ->orderByDesc('id')
            ->where('commentaryable_type', '!=', TaskReport::class)
            ->get();

        foreach ($comments as $comment) {
            $result[] = [
                $comment->user->name,
                $comment->user->lastname,
                $comment->user->number,
                $comment->created_at,
                strip_tags($comment->getRawOriginal('text')),
            ];
        }

        return collect($result);
    }
}
