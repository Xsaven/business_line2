<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * QuizAnswer Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $answer
 * @property int $quiz_question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\QuizQuestion|null $quizQuestion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Star[] $stars
 * @property-read int|null $stars_count
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer whereQuizQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuizAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuizAnswer extends Model
{
    const TITLE = 'Ответы викторин';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'quiz_answers';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'answer',
        'quiz_question_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'answer' => 'string',
        'quiz_question_id' => 'integer',
    ];

    /**
     * The "belongsToMany" relation for "Zvyozdy' viktorin".
     * @return BelongsToMany
     */
    public function stars() : BelongsToMany
    {
        return $this->belongsToMany(Star::class, 'quiz_answer_stars', 'quiz_answer_id', 'star_id');
    }

    /**
     * The "hasOne" relation for "Voprosy' viktorin".
     * @return HasOne
     */
    public function quizQuestion() : HasOne
    {
        return $this->hasOne(QuizQuestion::class, 'quiz_question_id', 'id');
    }
}
