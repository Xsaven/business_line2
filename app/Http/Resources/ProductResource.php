<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * ProductResource Class.
 * @mixin Product
 */
class ProductResource extends JsonResource
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
            'src' => $this->src,
            'cost' => $this->cost,
            'settings' => $this->settings,
            'first_setting' => $this->setting[0] ?? null,
            'all_settings' => $this->setting,
            'buy' => $this->buy,
            'scrap' => $this->scrap ?? [],
            'total_scrap' => $this->total_scrap,
            'daily_limit' => $this->daily_limit,
            'daily_limit_by' => $this->daily_limit_by,
            'today' => $this->daily_limit == 0 || $this->daily_limit >= $this->daily_limit_by
        ];
    }
}
