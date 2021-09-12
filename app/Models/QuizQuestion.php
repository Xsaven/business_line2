<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * QuizQuestion Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $question
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizAnswer[] $quizAnswers
 * @property-read int|null $quiz_answers_count
 * @property-read \App\Models\Task|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuizQuestion extends Model
{
    const TITLE = 'Вопросы викторин';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'quiz_questions';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'question',
        'task_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'question' => 'string',
        'task_id' => 'integer',
    ];

    /**
     * The "hasMany" relation for "Otvety' viktorin".
     * @return HasMany
     */
    public function quizAnswers() : HasMany
    {
        return $this->hasMany(QuizAnswer::class, 'quiz_question_id', 'id');
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
