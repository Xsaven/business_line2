<?php

namespace App\Http\Resources;

use App\Models\QuizAnswer;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin QuizAnswer
 */
class QuizAnswerResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'cost' => $this->cost,
            'answer' => $this->answer,
            'quiz_question_id' => $this->quiz_question_id,
        ];
    }
}
