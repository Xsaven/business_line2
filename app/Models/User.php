<?php

namespace App\Models;

use App\Models\Traits\User\UserAttributes;
use App\Models\Traits\User\UserHasLogs;
use App\Models\Traits\User\UserHasSubscribers;
use App\Models\Traits\User\UserNotifyConfig;
use App\Models\Traits\User\UserOnline;
use App\Models\Traits\User\UserScopes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string|null $lastname
 * @property string|null $login
 * @property int $balance
 * @property string|null $about
 * @property string|null $email
 * @property string $number
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property string|null $session
 * @property int $logins
 * @property int $seconds
 * @property int $likes
 * @property int $stickers
 * @property \Illuminate\Database\Eloquent\Collection|User[] $subscriptions
 * @property int $complete_tasks
 * @property \Illuminate\Support\Carbon|null $birthday_at
 * @property bool $active_commentaries
 * @property bool $active
 * @property int|null $direction_id
 * @property int|null $position_id
 * @property int|null $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentaries
 * @property-read int|null $commentaries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentaryLikes
 * @property-read int|null $commentary_likes_count
 * @property-read \App\Models\Direction|null $direction
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Download[] $downloads
 * @property-read int|null $downloads_count
 * @property-read string $full_name
 * @property-read string $short_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\Position|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizResult[] $quizResults
 * @property-read int|null $quiz_results_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $subscribers
 * @property-read int|null $subscribers_count
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaskReport[] $taskReportLikes
 * @property-read int|null $task_report_likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaskReport[] $taskReports
 * @property-read int|null $task_reports_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActiveCommentaries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthdayAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompleteTasks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStickers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSubscriptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ballance[] $ballances
 * @property-read int|null $ballances_count
 * @property-read mixed $balance_rating
 * @property-read mixed $like_rating
 */
class User extends Authenticatable
{
    use Notifiable, UserHasSubscribers, UserHasLogs, UserOnline, UserScopes, UserAttributes, UserNotifyConfig;

    const TITLE = 'Пользователи';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'lastname',
        'login',
        'balance',
        'about',
        'email',
        'number',
        'photo',
        'email_verified_at',
        'password',
        'remember_token',
        'session',
        'logins',
        'seconds',
        'likes',
        'stickers',
        'subscriptions',
        'complete_tasks',
        'birthday_at',
        'active_commentaries',
        'active',
        'direction_id',
        'position_id',
        'division_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'lastname' => 'string',
        'login' => 'string',
        'balance' => 'integer',
        'about' => 'string',
        'email' => 'string',
        'number' => 'string',
        'photo' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'session' => 'string',
        'logins' => 'integer',
        'seconds' => 'integer',
        'likes' => 'integer',
        'stickers' => 'integer',
        'subscriptions' => 'integer',
        'complete_tasks' => 'integer',
        'birthday_at' => 'datetime',
        'active_commentaries' => 'boolean',
        'active' => 'boolean',
        'direction_id' => 'integer',
        'position_id' => 'integer',
        'division_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'balance' => 0,
        'password' => 'none',
        'logins' => 0,
        'seconds' => 0,
        'likes' => 0,
        'stickers' => 0,
        'subscriptions' => 0,
        'complete_tasks' => 0,
        'active_commentaries' => false,
        'active' => true,
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @return array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The "hasMany" relation for "Balacy".
     * @return HasMany
     */
    public function ballances() : HasMany
    {
        return $this->hasMany(Ballance::class, 'user_id', 'id');
    }

    /**
     * The "hasMany" relation for "Zagruzki".
     * @return HasMany
     */
    public function downloads() : HasMany
    {
        return $this->hasMany(Download::class, 'user_id', 'id');
    }

    /**
     * The "hasMany" relation for "Rezultaty' viktorin".
     * @return HasMany
     */
    public function quizResults() : HasMany
    {
        return $this->hasMany(QuizResult::class, 'user_id', 'id');
    }

    /**
     * The "hasMany" relation for "Zakazy'".
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    /**
     * The "hasMany" relation for "Otcyoty' zadanii".
     * @return HasMany
     */
    public function taskReports() : HasMany
    {
        return $this->hasMany(TaskReport::class, 'user_id', 'id');
    }

    /**
     * The "hasMany" relation for "Kommentarii".
     * @return HasMany
     */
    public function commentaries() : HasMany
    {
        return $this->hasMany(Commentary::class, 'fun_id', 'id');
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
     * The "hasOne" relation for "Dolznosti".
     * @return HasOne
     */
    public function position() : HasOne
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    /**
     * The "hasOne" relation for "Podrazdeleniya".
     * @return HasOne
     */
    public function division() : HasOne
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
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
     * The "belongsToMany" relation for "Kommentarii".
     * @return BelongsToMany
     */
    public function commentaryLikes() : BelongsToMany
    {
        return $this->belongsToMany(Commentary::class, 'user_commentaries', 'fun_id', 'commentary_id');
    }

    /**
     * The "belongsToMany" relation for "Otcyoty' zadanii".
     * @return BelongsToMany
     */
    public function taskReportLikes() : BelongsToMany
    {
        return $this->belongsToMany(TaskReport::class, 'user_task_reports', 'task_report_id', 'fun_id');
    }
}
