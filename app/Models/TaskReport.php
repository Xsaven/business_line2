<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TaskReport\TaskReportHasLogs;
use App\Models\Traits\TaskReport\TaskReportLikeConfig;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Casts\VideoTrapCast;

/**
 * TaskReport Class
 * @package App\Models
 */
class TaskReport extends Model
{
    use TaskReportHasLogs, TaskReportLikeConfig;

    const TITLE = 'Отчёты заданий';

    const STATUS_CREATED = 'created';

    const STATUS_UPLOADING = 'uploading';

    const STATUS_UPLOADED = 'uploaded';

    const STATUS_CHECKED = 'checked';

    const STATUS_CANCELED = 'canceled';

    const STATUSES = [
        "created" => 'Созданный',
        "uploading" => 'Загрузка',
        "uploaded" => 'Загруженный',
        "checked" => 'Одобренный',
        "canceled" => 'Отменённый'
    ];

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'task_reports';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'status',
        'file',
        'comment',
        'user_id',
        'task_id',
        'fun_id'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "status" => 'string',
        "file" => VideoTrapCast::class,
        "comment" => 'string',
        "user_id" => 'integer',
        "task_id" => 'integer',
        "fun_id" => 'integer'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "status" => 'created'
    ];

    /**
     * The "hasOne" relation for "Polzovateli"
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei"
     * @return MorphMany
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "hasOne" relation for "Zadaniya"
     * @return HasOne
     */
    public function task() : HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli"
     * @return HasOne
     */
    public function fun() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'fun_id');
    }

    /**
     * The "morphMany" relation for "Kommentarii"
     * @return MorphMany
     */
    public function commentary() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }

    /**
     * The "belongsToMany" relation for "Polzovateli"
     * @return BelongsToMany
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_task_reports', 'fun_id', 'task_report_id');
    }

}
