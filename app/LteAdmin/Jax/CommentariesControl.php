<?php

namespace App\LteAdmin\Jax;

use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Http\Resources\CommentaryResource;
use App\Models\Commentary;
use App\Models\CommentaryRoom;
use App\Models\Setting;
use App\Providers\AppServiceProvider;
use App\Repositories\CommentaryRepository;
use Lar\LteAdmin\Core\ModelSaver;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * CommentariesControl Class.
 */
class CommentariesControl extends LteAdminExecutor
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list_for_approve(CommentaryRepository $repository)
    {
        return CommentaryResource::collection(
            $repository->model()->where('active', 0)->orderByDesc('id')->get()
        );
    }

    public function approve(int $id)
    {
        $comment = Commentary::find($id);

        if ($comment && $comment->update(['active' => 1])) {
            if ($comment->commentaryRoom instanceof CommentaryRoom && $comment->commentaryRoom->id === 1) {
                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$comment->id]]);
            } else {
                AllUserExec::dispatch(["comment-add-{$comment->commentaryable_id}" => $comment->id]);
            }
            AllAdminExec::dispatch(['commentaries:update']);
        }
    }

    /**
     * comment-9.
     */
    public function drop(int $id)
    {
        $comment = Commentary::find($id);

        if ($comment && $comment->delete()) {
            if ($comment->commentaryRoom instanceof CommentaryRoom && $comment->commentaryRoom->id === 1) {
                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$comment->id]]);
            } else {
                AllUserExec::dispatch(["comment-add-{$comment->commentaryable_id}" => [$comment->commentaryable_id, $comment->id]]);
            }
            AllAdminExec::dispatch(['commentaries:update']);
        }
    }

    /**
     * Switch commentary moderation.
     */
    public function switch_moderation()
    {
        Setting::whereName('free_chat')
            ->update(['value' => ! AppServiceProvider::$cfg['free_chat']]);

        if (AppServiceProvider::$cfg['free_chat']) {
            AllAdminExec::dispatch(['commentaries:update']);
        }

        $this->reload();
    }

    /**
     * Switch commentary.
     */
    public function switch_commentary()
    {
        Setting::whereName('commentary')
            ->update(['value' => ! AppServiceProvider::$cfg['commentary']]);

        AllUserExec::dispatch(['doc::reload']);

        $this->reload();
    }
}
