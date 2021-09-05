<?php

namespace App\Http\Resources;

use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CommentaryNoChildResource Class.
 * @mixin Commentary
 */
class CommentaryNoChildResource extends JsonResource
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
            'text' => $this->text,
            'likes' => $this->likes_count,
            'user' => UserResource::make($this->user),
            'created_at' => butty_date_time($this->created_at),
        ];
    }
}
