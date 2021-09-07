<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserForFansSelect extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     * @mixin User
     */
    public function toArray($request)
    {
        return [
            'full_name' => $this->name.' '.$this->lastname,
            'id' => $this->id,
            'avatar' => user_avatar($this->resource)
        ];
    }
}
