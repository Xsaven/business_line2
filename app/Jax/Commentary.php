<?php

namespace App\Jax;

use App\Events\CommentaryLike;
use App\Events\HomeCommentary;
use App\Http\Resources\CommentaryNoChildResource;
use App\Http\Resources\CommentaryResource;
use App\Repositories\AuthUserRepository;
use App\Repositories\CommentaryRepository;
use Lar\LJS\JaxExecutor;

/**
 * Commentary Class.
 */
class Commentary extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @param  int  $id
     * @return CommentaryNoChildResource|null
     */
    public function find(int $id)
    {
        $model = app(CommentaryRepository::class)->find($id);

        return $model ? CommentaryResource::make($model) : null;
    }

    /**
     * @param  string  $message
     * @return array
     */
    public function home_commentary(string $message)
    {
        $event = new HomeCommentary($message);

        event($event);

        return [
            'result' => $event->result(),
            'comment' => $event->commentary ?
                CommentaryResource::make($event->commentary) : null,
        ];
    }

    /**
     * @param  string  $message
     * @param  int  $parent_id
     * @return array
     */
    public function answer_commentary(string $message, int $parent_id)
    {
        $event = new \App\Events\Commentary($message, $parent_id);

        event($event);

        return [
            'result' => $event->result(),
            'comment' => $event->commentary ?
                CommentaryResource::make($event->commentary) : null,
        ];
    }

    /**
     * @param  int  $id
     * @return array
     */
    public function like(int $id)
    {
        $event = new CommentaryLike($id);

        event($event);

        return [
            'result' => $event->result(),
            'liked_comment_ids' => app(AuthUserRepository::class)->liked_comment_ids,
            'comment' => $event->commentary ?
                CommentaryResource::make($event->commentary) : null,
        ];
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function home_commentary_list()
    {
        return CommentaryResource::collection(
            app(CommentaryRepository::class)->home_commentaries
        );
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function commentary_childs(int $parent_id)
    {
        return CommentaryResource::collection(
            app(CommentaryRepository::class)->child($parent_id)
        );
    }
}
