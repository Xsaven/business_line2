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
    public static $comments = true;

    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fun' => $this->fun_id ? UserResource::make($this->fun) : null,
            'status' => $this->status,
            'likes' => $this->likes_count,
            'file' => $this->file,
            'comment' => $this->comment,
            'admin_comment' => $this->admin_comment,
            'month' => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'time' => Carbon::parse($this->created_at)->format('H:i'),
            'created_at' => butty_date_time($this->created_at),
            'user' => UserResource::make($this->user),
            'task' => TaskResource::make($this->task),
            'comments' => static::$comments ? CommentaryNoChildResource::collection($this->commentary) : null,
        ];
    }
}
