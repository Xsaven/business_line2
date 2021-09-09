<?php

namespace App\Models;

use App\Models\Traits\TaskReport\TaskReportHasLogs;
use App\Models\Traits\TaskReport\TaskReportLikeConfig;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * TaskReport Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $status
 * @property string|null $file
 * @property string|null $comment
 * @property int $user_id
 * @property int $task_id
 * @property int|null $fun_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentary
 * @property-read int|null $commentary_count
 * @property-read \App\Models\User|null $fun
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\Task|null $task
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereFunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereUserId($value)
 * @mixin \Eloquent
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
        'created' => 'Созданный',
        'uploading' => 'Загрузка',
        'uploaded' => 'Загруженный',
        'checked' => 'Одобренный',
        'canceled' => 'Отменённый',
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
        'fun_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'status' => 'string',
        'file' => 'string',
        'comment' => 'string',
        'user_id' => 'integer',
        'task_id' => 'integer',
        'fun_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'status' => 'created',
    ];

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei".
     * @return MorphMany
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "hasOne" relation for "Zadaniya".
     * @return HasOne
     */
    public function task() : HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function fun() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'fun_id');
    }

    /**
     * The "morphMany" relation for "Kommentarii".
     * @return MorphMany
     */
    public function commentary() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }

    /**
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_task_reports', 'fun_id', 'task_report_id');
    }
}
