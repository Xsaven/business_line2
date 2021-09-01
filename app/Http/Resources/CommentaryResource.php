<?php

namespace App\Http\Resources;

use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CommentaryResource Class.
 * @mixin Commentary
 */
class CommentaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'text' => $this->text,
            'likes' => $this->likes,
            'user' => UserResource::make($this->user),
            'created_at' => butty_date_time($this->created_at),
            'child' => self::collection(
                $this->commentaries()->with('user', 'commentaries')->get()
            ),
        ];
    }
}
