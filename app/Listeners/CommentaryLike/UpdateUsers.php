<?php

namespace App\Listeners\CommentaryLike;

use App\Events\CommentaryLike;
use App\Repositories\AuthUserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUsers
{
    /**
     * Handle the event.
     *
     * @param  CommentaryLike  $event
     * @return void
     */
    public function handle(CommentaryLike $event)
    {
        if ($event->result()) {
            $user = app(AuthUserRepository::class)
                ->user;

            $user->logs()->create([
                'field' => 'like',
                'type' => 'like',
                'message' => 'Поставил лайк комментарию '.$event->commentary->id,
            ]);
//
//            $user->update([
//                'likes' => $user->commentaryLikes()->count() + $user->taskReportLikes()->count(),
//            ]);
        }
    }
}
