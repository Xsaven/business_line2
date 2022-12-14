<?php

namespace App\Models;

use App\Models\Traits\Task\TaskHasLogs;
use App\Models\Traits\Task\TaskMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Task Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string|null $short_description
 * @property string $event_type
 * @property string $report_type
 * @property array|null $report_configs
 * @property string $action_type
 * @property int $cost
 * @property string $welcome_type
 * @property string|null $welcome_video
 * @property string|null $welcome_banner
 * @property string|null $prize_src
 * @property string $terms_of_participation
 * @property bool $is_challenge
 * @property bool $fans_task
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $finish_at
 * @property int $direction_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Direction|null $direction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Download[] $downloads
 * @property-read int|null $downloads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizQuestion[] $quizQuestions
 * @property-read int|null $quiz_questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizResult[] $quizResults
 * @property-read int|null $quiz_results_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaskReport[] $taskReports
 * @property-read int|null $task_reports_count
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Query\Builder|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereFansTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereFinishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereIsChallenge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task wherePrizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereReportConfigs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereReportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTermsOfParticipation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereWelcomeBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereWelcomeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereWelcomeVideo($value)
 * @method static \Illuminate\Database\Query\Builder|Task withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Task withoutTrashed()
 * @mixin \Eloquent
 */
class Task extends Model
{
    use TaskHasLogs, TaskMutators, SoftDeletes;

    const TITLE = '??????????????';

    const ACTION_TYPE_AUTO = 'auto';

    const ACTION_TYPE_MANUALLY = 'manually';

    const REPORT_TYPE_TEXT = 'text';

    const REPORT_TYPE_VIDEO = 'video';

    const REPORT_TYPE_IMAGE = 'image';

    const REPORT_TYPE_TEXT_OR_IMAGE_OR_VIDEO = 'text_or_image_or_video';

    const REPORT_TYPE_IMAGE_OR_VIDEO = 'image_or_video';

    const REPORT_TYPE_TEXT_OR_VIDEO = 'text_or_video';

    const REPORT_TYPE_TEXT_OR_IMAGE = 'text_or_image';

    const REPORT_TYPE_QUIZ = 'quiz';

    const REPORT_TYPE_STAR_QUIZ = 'star_quiz';

    const REPORT_TYPE_DOWNLOAD_FILE = 'download_file';

    const REPORT_TYPE_DOWNLOAD_FILE_PHOTO = 'download_file_photo';

    const EVENT_TYPE_MULTI_DAY = 'multi-day';

    const EVENT_TYPE_ONE_DAY = 'one-day';

    const EVENT_TYPE_INSTANT = 'instant';

    const WELCOME_TYPE_BANNER = 'banner';

    const WELCOME_TYPE_VIDEO = 'video';

    const EVENT_TYPES = [
        'multi-day' => '????????????????????????',
        'one-day' => '??????????????????????',
        'instant' => '????????????????????',
    ];

    const REPORT_TYPES = [
        'text' => '?????????????????? ??????????',
        'video' => '?????????? ??????????',
        'image' => '???????? ??????????',
        'text_or_image_or_video' => '??????????, ???????? ?????? ?????????? ??????????',
        'image_or_video' => '???????? ?????? ?????????? ??????????',
        'text_or_video' => '?????????? ?? ?????????? ??????????',
        'text_or_image' => '?????????? ?? ???????? ??????????',
//        'quiz' => '??????????????????',
//        'star_quiz' => '???????????????? ??????????????????',
        'download_file' => '?????????????? ????????',
        'download_file_photo' => '?????????????? ???????? ?? ???????????????????? ????????',
    ];

    const ACTION_TYPES = [
        'auto' => '????????????????????????????',
        'manually' => '??????????????????????????',
    ];

    const WELCOME_TYPE = [
        'banner' => '??????????',
        'video' => '??????????',
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
        'report_configs',
        'action_type',
        'cost',
        'welcome_type',
        'welcome_video',
        'welcome_banner',
        'prize_src',
        'terms_of_participation',
        'is_challenge',
        'fans_task',
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
        'report_configs' => 'array',
        'action_type' => 'string',
        'cost' => 'integer',
        'welcome_type' => 'string',
        'welcome_video' => 'string',
        'welcome_banner' => 'string',
        'prize_src' => 'string',
        'terms_of_participation' => 'string',
        'is_challenge' => 'boolean',
        'fans_task' => 'boolean',
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
        'welcome_type' => 'banner',
        'is_challenge' => 0,
        'fans_task' => false,
    ];

    /**
     * The "hasMany" relation for "Zagruzki".
     * @return HasMany
     */
    public function downloads() : HasMany
    {
        return $this->hasMany(Download::class, 'task_id', 'id');
    }

    /**
     * The "hasMany" relation for "Rezultaty' viktorin".
     * @return HasMany
     */
    public function quizResults() : HasMany
    {
        return $this->hasMany(QuizResult::class, 'task_id', 'id');
    }

    /**
     * The "hasMany" relation for "Otcyoty' zadanii".
     * @return HasMany
     */
    public function taskReports() : HasMany
    {
        return $this->hasMany(TaskReport::class, 'task_id', 'id');
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
