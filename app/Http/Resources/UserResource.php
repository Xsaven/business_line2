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
            'short_name' => mb_strtoupper(
                $this->lastname ? (mb_substr($this->name, 0, 1).mb_substr($this->lastname, 0,
                        1)) : mb_substr($this->name, 0, 2)
            ),
            'full_name' => $this->name.' '.$this->lastname,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'login' => $this->login,
        ];
    }
}
