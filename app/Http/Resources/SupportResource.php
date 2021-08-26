<?php

namespace App\Http\Resources;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * SupportResource Class.
 * @package App\Http\Resources
 * @mixin SettingRepository
 */
class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->all->pluck('value', 'name')
            ->only('support_email', 'support_telegram_phone', 'support_telegram_link', 'support_whatsapp_phone', 'support_whatsapp_link')
            ->toArray();
    }
}
