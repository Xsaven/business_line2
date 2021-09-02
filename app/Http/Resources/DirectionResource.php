<?php

namespace App\Http\Resources;

use App\Models\Direction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * DirectionResource Class.
 * @mixin Direction
 */
class DirectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'video' => $this->video,
            'arbitrator_name' => $this->arbitrator_name,
            'arbitrator_photo' => $this->arbitrator_photo,
            'arbitrator_position' => $this->arbitrator_position,
            'description' => $this->description,
            'terms_of_participation' => $this->terms_of_participation,
            'start_at' => Carbon::parse($this->start_at)->toDateString(),
            'end_at' => Carbon::parse($this->end_at)->toDateString(),
        ];
    }
}
