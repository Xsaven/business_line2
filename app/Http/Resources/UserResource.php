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
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fool_name' => $this->name.' '.$this->lastname,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'login' => $this->login,
        ];
    }
}
