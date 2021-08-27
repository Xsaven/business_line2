<?php

namespace App\Models;

use App\Models\Traits\Task\TaskHasLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Task Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string|null $short_description
 * @property string $event_type
 * @property string $report_type
 * @property string $action_type
 * @property array|null $action_configs
 * @property int $cost
 * @property string|null $prize_src
 * @property string $terms_of_participation
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $finish_at
 * @property int $direction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Direction|null $direction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizQuestion[] $quizQuestions
 * @property-read int|null $quiz_questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizResult[] $quizResults
 * @property-read int|null $quiz_results_count
 * @method static \Database\Factories\TaskFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActionConfigs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereFinishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task wherePrizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereReportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTermsOfParticipation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use TaskHasLogs, HasFactory;

    const TITLE = 'Задания';

    const ACTION_TYPE_AUTO = 'auto';

    const ACTION_TYPE_MANUALLY = 'manually';

    const ACTION_TYPE_SUBSCRIBE = 'subscribe';

    const ACTION_TYPE_REACTION = 'reaction';

    const ACTION_TYPE_PROFILE = 'profile';

    const ACTION_TYPE_TASK_COMPLETE = 'task-complete';

    const REPORT_TYPE_TEXT = 'text';

    const REPORT_TYPE_VIDEO = 'video';

    const REPORT_TYPE_IMAGE = 'image';

    const REPORT_TYPE_QUIZ = 'quiz';

    const REPORT_TYPE_STAR_QUIZ = 'star_quiz';

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
        'star_quiz' => 'Звёздная викторина',
    ];

    const ACTION_TYPES = [
        'auto' => 'Автоматическое',
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
        'short_description',
        'event_type',
        'report_type',
        'action_type',
        'action_configs',
        'cost',
        'prize_src',
        'terms_of_participation',
        'start_at',
        'finish_at',
        'direction_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'short_description' => 'string',
        'event_type' => 'string',
        'report_type' => 'string',
        'action_type' => 'string',
        'action_configs' => 'array',
        'cost' => 'integer',
        'prize_src' => 'string',
        'terms_of_participation' => 'string',
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
        'direction_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'event_type' => 'instant',
        'report_type' => 'text',
        'action_type' => 'manually',
        'cost' => 0,
    ];

    /**
     * The "hasMany" relation for "Rezultaty' viktorin".
     * @return HasMany
     */
    public function quizResults() : HasMany
    {
        return $this->hasMany(QuizResult::class, 'task_id', 'id');
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
     * The "hasOne" relation for "Napravleniya".
     * @return HasOne
     */
    public function direction() : HasOne
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    /**
     * The "hasMany" relation for "Voprosy' viktorin".
     * @return HasMany
     */
    public function quizQuestions() : HasMany
    {
        return $this->hasMany(QuizQuestion::class, 'task_id', 'id');
    }
}
