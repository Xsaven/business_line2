<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Repositories\AuthUserRepository;
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
        $repo = app(AuthUserRepository::class);

        return [
            'id' => $this->id,
            'balance' => $this->balance,
            'notification_count' => $repo->notifications_count,
            'new_notifications_count' => $repo->new_notifications_count,
            'subscribe_direction' => (int) (bool) $this->direction_id,
            'liked_comment_ids' => $repo->liked_comment_ids,
            'active_commentaries' => $this->active_commentaries,
        ];
    }
}
