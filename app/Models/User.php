<?php

namespace App\Models;

use App\Models\Traits\User\UserAttributes;
use App\Models\Traits\User\UserHasLogs;
use App\Models\Traits\User\UserHasSubscribers;
use App\Models\Traits\User\UserNotifyConfig;
use App\Models\Traits\User\UserOnline;
use App\Models\Traits\User\UserScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Class.
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable, UserHasSubscribers, UserHasLogs, UserOnline, UserScopes, UserAttributes, UserNotifyConfig, HasFactory;

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
        return $this->hasMany(Commentary::class, 'user_id', 'id');
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
     * The "belongsToMany" relation for "Polzovateli".
     * @return BelongsToMany
     */
    public function subscriptions() : BelongsToMany
    {
        return $this->belongsToMany(self::class, 'user_subscriptions', 'user_id', 'subscription_id');
    }

    /**
     * The "belongsToMany" relation for "Kommentarii".
     * @return BelongsToMany
     */
    public function commentaryLikes() : BelongsToMany
    {
        return $this->belongsToMany(Commentary::class, 'user_commentaries', 'user_id', 'commentary_id');
    }
}
