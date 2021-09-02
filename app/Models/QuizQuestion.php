<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * QuizQuestion Class.
 * @package App\Models
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
        'cost',
        'task_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'question' => 'string',
        'cost' => 'integer',
        'task_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'cost' => 1,
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
        return $this->hasOne(Task::class, 'task_id', 'id');
    }
}
