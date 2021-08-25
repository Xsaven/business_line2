<?php

namespace App\Jax;

use App\Events\Question\Ask;
use App\Events\Question\LikeToggle;
use App\Http\Resources\QuestionResource;
use App\Repositories\QuestionRepository;
use App\Repositories\UserRepository;
use Lar\LJS\JaxExecutor;

/**
 * Questions Class.
 */
class Questions extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list(QuestionRepository $repository)
    {
        return QuestionResource::collection(
            $repository->list()
        );
    }

    /**
     * @return array
     */
    public function like_toggle(int $id)
    {
        $event = new LikeToggle($id);

        event($event);

        return [
            'result' => $event->result(),
            'data' => $event->result() ? $this->list(app(QuestionRepository::class)) : [],
            'likes' => $event->result() ? app(User::class)->question_likes(app(UserRepository::class)) : [],
        ];
    }

    /**
     * @return array
     */
    public function ask(string $message)
    {
        $event = new Ask($message);

        event($event);

        return [
            'result' => $event->result(),
            'data' => $event->result() ? $this->list(app(QuestionRepository::class)) : [],
            'likes' => $event->result() ? app(User::class)->question_likes(app(UserRepository::class)) : [],
        ];
    }
}
