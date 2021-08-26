<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * AuthUserResource Class.
 * @package App\Http\Resources
 */
class AuthUserResource extends UserResource
{
    /**
     * Transform the resource into an array.
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            AuthDataResource::make($this->resource)->toArray($request)
        );
    }
}
