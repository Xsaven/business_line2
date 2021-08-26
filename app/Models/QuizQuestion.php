<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * QuizQuestion Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $question
 * @property array $variant_answers
 * @property string $success_answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @method static \Database\Factories\QuizQuestionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereSuccessAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizQuestion whereVariantAnswers($value)
 * @mixin \Eloquent
 */
class QuizQuestion extends Model
{
    use HasFactory;

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
        'variant_answers',
        'success_answer',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'question' => 'string',
        'variant_answers' => 'json',
        'success_answer' => 'string',
    ];

    /**
     * The "belongsToMany" relation for "Zadaniya".
     * @return BelongsToMany
     */
    public function tasks() : BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_quiz_questions', 'task_id', 'quiz_question_id');
    }
}
