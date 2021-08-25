<?php

namespace App\LteAdmin\Jax;

use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use Lar\LteAdmin\Jax\LteAdminExecutor;

/**
 * QuestionsControl Class.
 */
class QuestionsControl extends LteAdminExecutor
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list_for_approve(QuestionRepository $repository)
    {
        return QuestionResource::collection(
            $repository->model()->where('active', 0)->orderByDesc('id')->get()
        );
    }

    public function approve(int $id)
    {
        $question = Question::find($id);

        if ($question && $question->update(['active' => 1])) {
            AllUserExec::dispatch(['v-home-questions:load_questions']);
            AllAdminExec::dispatch(['questions:update']);
        }
    }

    public function drop(int $id)
    {
        $question = Question::find($id);

        if ($question && $question->delete()) {
            AllUserExec::dispatch(['v-home-questions:load_questions']);
            AllAdminExec::dispatch(['questions:update']);
        }
    }
}
