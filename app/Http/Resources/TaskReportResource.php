<?php

namespace App\Http\Resources;

use App\Models\TaskReport;
use Carbon\Carbon;
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
                return ['files' => \Storage::disk('yandexcloud')->url($file)];
            })->toArray(),
            'comment' => $this->comment,
            'month' => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'time' => Carbon::parse($this->created_at)->format('H:i')
        ];
    }
}
