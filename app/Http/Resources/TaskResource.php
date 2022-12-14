<?php

namespace App\Http\Resources;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * TaskResource Class.
 * @mixin Task
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $now = now()->setHour(0)->setMinute(0)->setSecond(0)->setMillisecond(0);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'cost' => $this->cost,
            'direction_id' => $this->direction_id,
            'terms_of_participation' => $this->terms_of_participation,
            'start_at' => Carbon::parse($this->start_at)->toDateString(),
            'finish_at' => Carbon::parse($this->finish_at)->toDateString(),
            'started' => $now >= Carbon::parse($this->start_at),
            'finished' => $now > Carbon::parse($this->finish_at),
            'event_type' => $this->event_type,
            'report_type' => $this->report_type,
            'report_name' => Task::REPORT_TYPES[$this->report_type],
            'report_configs' => $this->report_configs,
            'action_type' => $this->action_type,
            'complete_user' => $this->taskReports()->where('user_id', \Auth::id())->exists(),
            'participants' => $this->taskReports()->count(),
            'fans_task' => $this->fans_task,
            'welcome_type' => $this->welcome_type,
            'welcome_video' => $this->welcome_video,
            'welcome_banner' => $this->welcome_banner,
        ];
    }
}
