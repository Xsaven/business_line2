<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * AuthDataResource Class.
 * @package App\Http\Resources
 * @mixin User
 */
class AuthDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'balance' => $this->balance,
            'notification_count' => $this->notifications()->whereNull('read_at')->count(),
        ];
    }
}
