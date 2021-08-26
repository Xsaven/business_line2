<?php

namespace App\Http\Resources;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * FaqResource Class.
 * @mixin Faq
 */
class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
         'id' => $this->id,
         'question' => $this->question,
         'answer' => $this->answer,
       ];
    }
}
