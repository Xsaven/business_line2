<?php

namespace App\Models\Traits\TaskReport;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * TaskReportLikeConfig Trait.
 * @package App\Models\Traits\TaskReport
 */
trait TaskReportLikeConfig
{
    /**
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_task_reports', 'task_report_id', 'fun_id');
    }
}
