<?php

namespace App\Http\Resources;

use App\Models\Sticker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * StickerResource Class.
 * @package App\Http\Resources
 * @mixin Sticker
 */
class StickerResource extends JsonResource
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
            'src' => asset($this->src),
        ];
    }
}
