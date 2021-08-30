<?php

namespace App\Models;

use App\Models\Traits\TaskReport\TaskReportHasLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * TaskReport Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $status
 * @property int $likes
 * @property string|null $src
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $finish_at
 * @property int $user_id
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentary
 * @property-read int|null $commentary_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\Task|null $task
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereFinishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskReport whereUserId($value)
 * @mixin \Eloquent
 */
class TaskReport extends Model
{
    use TaskReportHasLogs;

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
        'checked' => 'Мгновенное',
        'canceled' => 'Мгновенное',
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
        'likes',
        'src',
        'comment',
        'start_at',
        'finish_at',
        'user_id',
        'task_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'status' => 'string',
        'likes' => 'integer',
        'src' => 'string',
        'comment' => 'string',
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
        'user_id' => 'integer',
        'task_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'status' => 'created',
        'likes' => 0,
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
     * The "morphMany" relation for "Kommentarii".
     * @return MorphMany
     */
    public function commentary() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }
}
