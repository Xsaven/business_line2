<?php

namespace App\Http\Resources;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * TaskResource Class.
 * @mixin Task
 */
class TaskResource extends JsonResource
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
            'short_description' => $this->short_description,
            'cost' => $this->cost,
            'terms_of_participation' => $this->terms_of_participation,
            'start_at' => Carbon::parse($this->start_at)->format('Y-m-d'),
            'finish_at' => Carbon::parse($this->finish_at)->format('Y-m-d'),
            'report_type' => $this->report_type,
        ];
    }
}
