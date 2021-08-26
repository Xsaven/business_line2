<?php

namespace App\Models;

use App\Models\Traits\Task\TaskHasLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Task Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $event_type
 * @property string $report_type
 * @property array $action_types
 * @property int $cost
 * @property string|null $prize_src
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $finish_at
 * @property int $track_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizAnswer[] $quizAnswers
 * @property-read int|null $quiz_answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizQuestion[] $quizQuestions
 * @property-read int|null $quiz_questions_count
 * @property-read \App\Models\Track|null $track
 * @method static \Database\Factories\TaskFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActionTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereFinishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task wherePrizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereReportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use TaskHasLogs, HasFactory;

    const TITLE = 'Задания';

    const ACTION_TYPE_MANUALLY = 'manually';

    const ACTION_TYPE_SUBSCRIBE = 'subscribe';

    const ACTION_TYPE_REACTION = 'reaction';

    const ACTION_TYPE_PROFILE = 'profile';

    const ACTION_TYPE_TASK_COMPLETE = 'task-complete';

    const REPORT_TYPE_TEXT = 'text';

    const REPORT_TYPE_VIDEO = 'video';

    const REPORT_TYPE_IMAGE = 'image';

    const REPORT_TYPE_QUIZ = 'quiz';

    const EVENT_TYPE_MULTI_DAY = 'multi-day';

    const EVENT_TYPE_ONE_DAY = 'one-day';

    const EVENT_TYPE_INSTANT = 'instant';

    const EVENT_TYPES = [
        'multi-day' => 'Многодневное',
        'one-day' => 'Однодневное',
        'instant' => 'Мгновенное',
    ];

    const REPORT_TYPES = [
        'text' => 'Текстовый отчёт',
        'video' => 'Видео отчёт',
        'image' => 'Фото отчёт',
        'quiz' => 'Викторина',
    ];

    const ACTION_TYPES = [
        'manually' => 'Начисление баллов вручную (Модерирование)',
        'subscribe' => 'Подписка(N подписок) на других пользователей',
        'reaction' => 'Реакции (N стикеров / N лайков) к любым отчетам на странице направления/профиле пользователя',
        'profile' => 'Заполнение всей дополнительной информации в профиле, включая фото',
        'task-complete' => 'Выполнение N заданий подряд',
    ];

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'event_type',
        'report_type',
        'action_types',
        'cost',
        'prize_src',
        'start_at',
        'finish_at',
        'track_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'event_type' => 'string',
        'report_type' => 'string',
        'action_types' => 'json',
        'cost' => 'integer',
        'prize_src' => 'string',
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
        'track_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'event_type' => 'instant',
        'report_type' => 'text',
        'cost' => 1,
    ];

    /**
     * The "hasMany" relation for "Otvety' viktorin".
     * @return HasMany
     */
    public function quizAnswers() : HasMany
    {
        return $this->hasMany(QuizAnswer::class, 'task_id', 'id');
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
     * The "hasOne" relation for "Treki".
     * @return HasOne
     */
    public function track() : HasOne
    {
        return $this->hasOne(Track::class, 'id', 'track_id');
    }

    /**
     * The "belongsToMany" relation for "Voprosy' viktorin".
     * @return BelongsToMany
     */
    public function quizQuestions() : BelongsToMany
    {
        return $this->belongsToMany(QuizQuestion::class, 'task_quiz_questions', 'task_id', 'quiz_question_id');
    }
}
