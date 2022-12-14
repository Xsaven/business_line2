<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * UserResource Class.
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'avatar' => user_avatar($this->resource),
            'short_name' => $this->short_name,
            'full_name' => $this->full_name,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'login' => $this->login,
            'likes' => $this->likes,
            'balance' => $this->balance,
            'max_balance' => $this->max_balance,
            'like_rating' => $this->like_rating,
            'balance_rating' => $this->balance_rating,
            'photo' => $this->photo ? asset($this->photo) : $this->photo,
            'position' => $this->position_id ? $this->position->name : '',
            'division' => $this->division_id ? $this->division->name : '',
            'follow_direction' => $this->direction ?? null,
            'about' => $this->about,
            'division_id' => $this->division_id,
            'position_id' => $this->position_id,
            'direction_id' => $this->direction_id,
            'reports_count' => $this->task_reports_count,
        ];
    }
}
