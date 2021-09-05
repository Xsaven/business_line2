<?php

namespace App\Http\Resources;

use App\Models\CommentaryRoom;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CommentaryRoomResource Class.
 * @package App\Http\Resources
 * @mixin CommentaryRoom
 */
class CommentaryRoomResource extends JsonResource
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
            'name' => $this->name,
            'title' => $this->title,
            'state' => $this->state,
            'state_name' => CommentaryRoom::STATES[$this->state],
            'video_title' => $this->video_title,
            'video_info' => $this->video_info,
            'video_data' => $this->video_data,
            'translation_data' => $this->translation_data,
            'description' => $this->description,
        ];
    }
}
