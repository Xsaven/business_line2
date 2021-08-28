<?php

namespace App\Http\Resources;

use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * PrizeResource Class.
 * @mixin Prize
 */
class PrizeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'name' => $this->name,
          'src' => $this->src,
        ];
    }
}
