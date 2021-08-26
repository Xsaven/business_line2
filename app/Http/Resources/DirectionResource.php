<?php

namespace App\Http\Resources;

use App\Repositories\DirectionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * DirectionResource Class.
 * @mixin DirectionRepository
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
        return $this->model()->all();
    }
}
