<?php

namespace App\Http\Resources;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * TaskReportResource Class.
 * @mixin TaskReport
 */
class TaskReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => $this->status,
            'likes' => $this->likes,
            'files' => collect($this->files)->map(function ($file) {
                return ['files' => 'https://storage.yandexcloud.net/dellin'.$file];
            })->toArray(),
            'comment' => $this->comment

        ];
    }
}
