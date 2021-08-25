<?php

namespace App\Exports;

use App\Models\Comment;
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
            ['Пользователь', 'Почта', 'Дата', 'Комментарий'],
        ];

        $comments = Comment::whereActive(1)
            ->with('user')
            ->orWhereNotNull('deleted_at')
            ->orderByDesc('id')
            ->get();

        foreach ($comments as $comment) {
            $result[] = [$comment->user->name, $comment->user->email, $comment->created_at, $comment->message];
        }

        return collect($result);
    }
}
