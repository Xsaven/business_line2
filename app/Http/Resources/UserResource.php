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
            'avatar' => user_avatar($this->resource),
            'short_name' => $this->short_name,
            'full_name' => $this->full_name,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'login' => $this->login,
            'likes' => $this->likes,
            'balance' => $this->balance,
            'photo' => $this->photo ? asset($this->photo) : $this->photo,
            'position' => $this->position ? $this->position->name : '',
            'follow_direction' => $this->direction ?? null,
            'about' => $this->about
        ];
    }
}
