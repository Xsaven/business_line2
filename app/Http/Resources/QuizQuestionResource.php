<?php

namespace App\Http\Resources;

use App\Models\QuizQuestion;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin QuizQuestion
 */
class QuizQuestionResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'task_id' => $this->task_id,
            'answers' => QuizAnswerResource::collection($this->quizAnswers)->toArray(request()),
        ];
    }
}
