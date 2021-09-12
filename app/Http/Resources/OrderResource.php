<?php

namespace App\Http\Resources;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * OrderResource Class.
 * @mixin Order
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'delivery' => $this->delivery->address,
            'product' => $this->products,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y')
        ];
    }
}
