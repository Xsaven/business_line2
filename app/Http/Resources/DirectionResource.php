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
        //if ($this->id == 3) dd($this->banner);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'video' => $this->video,
            'banner' => $this->banner ? asset($this->banner) : null,
            'type' => $this->type,
            'arbitrator_name' => $this->arbitrator_name,
            'arbitrator_photo' => $this->arbitrator_photo,
            'arbitrator_position' => $this->arbitrator_position,
            'description' => $this->description,
            'description_inside' => $this->description_inside,
            'terms_of_participation' => $this->terms_of_participation,
            'start_at' => Carbon::parse($this->start_at)->toDateString(),
            'end_at' => Carbon::parse($this->end_at)->toDateString(),
            'prizes' => $this->prizes,
        ];
    }
}
