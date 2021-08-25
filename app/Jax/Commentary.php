<?php

namespace App\Jax;

use App\Events\Commentary\Message;
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
     * @return array
     */
    public function message(string $message, int $parent_id = null)
    {
        $event = new Message($message, $parent_id ?? null);

        event($event);

        return ['result' => $event->result()];
    }
}
