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
                AllUserExec::dispatch(['update::add_comment_to_home' => [$comment->id]]);
            } else {
                AllUserExec::dispatch(['update::add_commentary_child_id' => [$comment->commentaryable_id, $comment->id]]);
                //AllUserExec::dispatch(['v-home-commentaries:load_commentaries']);
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
            if ($comment->parent_id) {
                AllUserExec::dispatch(["comment-{$comment->parent_id}"]);
            } else {
                AllUserExec::dispatch(['v-home-commentaries:load_commentaries']);
            }
            AllAdminExec::dispatch(['commentaries:update']);
        }
    }

    public function anchor(int $id)
    {
        $comment = Commentary::find($id);

        if ($comment && $comment->update(['anchored' => 1, 'active' => 1])) {
            if ($comment->parent_id) {
                AllUserExec::dispatch(["comment-{$comment->parent_id}"]);
            } else {
                AllUserExec::dispatch(['v-home-commentaries:load_commentaries']);
            }
            AllAdminExec::dispatch(['commentaries:update']);
        }
    }

    /**
     * Switch commentary moderation.
     */
    public function switch_moderation()
    {
        Setting::whereName('commentary_moderation')
            ->update(['value' => ! AppServiceProvider::$cfg['commentary_moderation']]);

        if (AppServiceProvider::$cfg['commentary_moderation']) {
            Commentary::where('active', 0)->update([
                'active' => 1,
            ]);

            AllUserExec::dispatch(['v-home-commentaries:load_commentaries']);
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
