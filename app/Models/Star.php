<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Star Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuizAnswer[] $quizAnswers
 * @property-read int|null $quiz_answers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Star newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Star newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Star query()
 * @method static \Illuminate\Database\Eloquent\Builder|Star whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Star whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Star whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Star wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Star whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Star whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Star extends Model
{
    const TITLE = 'Звёзды викторин';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'stars';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'text',
        'photo',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'text' => 'string',
        'photo' => 'string',
    ];

    /**
     * The "belongsToMany" relation for "Otvety' viktorin".
     * @return BelongsToMany
     */
    public function quizAnswers() : BelongsToMany
    {
        return $this->belongsToMany(QuizAnswer::class, 'quiz_answer_stars', 'quiz_answer_id', 'star_id');
    }
}
