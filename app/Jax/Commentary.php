<?php

namespace App\Jax;

use App\Events\HomeCommentary;
use App\Http\Resources\CommentaryResource;
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
     * @return array
     */
    public function list(int $all_to = 1)
    {
        $repository = new CommentaryRepository();

        $list = $repository->parent_list($all_to);

        return [
            'anchored' => CommentaryResource::collection(
                $repository->anchored()
            ),
            'list' => CommentaryResource::collection(
                $list->lastPage() >= $list->currentPage() ? $list : []
            ),
        ];
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function child_list(int $id)
    {
        $repository = new CommentaryRepository();

        return CommentaryResource::collection(
            $repository->child_list($id)
        );
    }

    /**
     * @param  string  $message
     * @return array
     */
    public function home_commentary(string $message)
    {
        $event = new HomeCommentary($message);

        event($event);

        return ['result' => $event->result()];
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
}
