<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * QuizResult Class.
 *
 * @package App\Models
 * @property int $id
 * @property bool $is_success
 * @property string $time
 * @property int $user_id
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task|null $task
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereIsSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizResult whereUserId($value)
 * @mixin \Eloquent
 */
class QuizResult extends Model
{
    const TITLE = 'Результаты викторин';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'quiz_results';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'is_success',
        'time',
        'user_id',
        'task_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'is_success' => 'boolean',
        'time' => 'string',
        'user_id' => 'integer',
        'task_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'is_success' => 1,
        'time' => '00:00',
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
     * The "hasOne" relation for "Zadaniya".
     * @return HasOne
     */
    public function task() : HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }
}
