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
//            if ($comment->commentaryRoom instanceof CommentaryRoom && $comment->commentaryRoom->id === 1) {
//                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$comment->id]]);
//
//            } else {
//                AllUserExec::dispatch(["comment-add-{$comment->commentaryable_id}" => $comment->id]);
//            }
            admin()->logs()->create([
                'field' => 'profile',
                'type' => 'update',
                'message' => 'Одобрил комментарий '.$comment->id,
            ]);
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
                admin()->logs()->create([
                    'field' => 'profile',
                    'type' => 'update',
                    'message' => 'Удалил комментарий '.$comment->id,
                ]);
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

        AllUserExec::dispatch(['doc::reload']);

        admin()->logs()->create([
            'field' => 'commentaries',
            'type' => 'control',
            'message' => (AppServiceProvider::$cfg['free_chat'] ? 'Выключил' : 'Включил').' модерацию комментариев',
        ]);

        $this->reload();
    }

    /**
     * Switch commentary.
     */
    public function switch_commentary()
    {
        Setting::whereName('osm')
            ->update(['value' => ! AppServiceProvider::$cfg['osm']]);

        AllUserExec::dispatch(['doc::reload']);

        admin()->logs()->create([
            'field' => 'shop',
            'type' => 'control',
            'message' => (AppServiceProvider::$cfg['osm'] ? 'Выключил' : 'Включил').' режим магазина',
        ]);

        $this->reload();
    }

    /**
     * Switch commentary.
     */
    public function switch_support()
    {
        $val = isset(AppServiceProvider::$cfg['support']) ? (AppServiceProvider::$cfg['support'] ? 0 : 1) : 0;

        Setting::updateOrCreate([
            'name' => 'support',
        ], [
            'value' => $val,
        ]);

        AllUserExec::dispatch(['doc::reload']);

        admin()->logs()->create([
            'field' => 'support',
            'type' => 'control',
            'message' => ($val ? 'Включил' : 'Выключил').' поддержку',
        ]);
        $this->reload();
    }

    /**
     * Switch stickers.
     */
    public function switch_stickers()
    {
        $val = isset(AppServiceProvider::$cfg['stickers']) ? (AppServiceProvider::$cfg['stickers'] ? 0 : 1) : 0;

        Setting::updateOrCreate([
            'name' => 'stickers',
        ], [
            'value' => $val,
        ]);

        AllUserExec::dispatch(['doc::reload']);

        admin()->logs()->create([
            'field' => 'stickers',
            'type' => 'control',
            'message' => ($val ? 'Включил' : 'Выключил').' стикеры в чате',
        ]);
        $this->reload();
    }
}
