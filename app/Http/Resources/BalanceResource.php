<?php

namespace App\Http\Resources;

use App\Models\Ballance;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Ballance
 */
class BalanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        list($day, $month) = explode(":", $this->created_at->format('d:m'));
        return [
            'message' => $this->message,
            'task' => $this->task_id ? TaskResource::make($this->task) : null,
            'cost' => $this->cost,
            'month' => $month,
            'day' => $day,
        ];
    }
}
