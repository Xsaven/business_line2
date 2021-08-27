<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Notifications\DatabaseNotification;

/**
 * NotificationResource Class.
 * @package App\Http\Resources
 * @mixin DatabaseNotification
 */
class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->data;

        return [
            'created_at' => butty_date_time($this->created_at),
            'message' => $data['message'] ?? '',
            'link_title' => $data['link_title'] ?? '',
            'link' => $data['link'] ?? '',
        ];
    }
}
