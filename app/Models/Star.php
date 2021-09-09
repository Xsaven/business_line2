<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Star Class
 * @package App\Models
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
        'photo'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "text" => 'string',
        "photo" => 'string'
    ];

    /**
     * The "belongsToMany" relation for "Otvety' viktorin"
     * @return BelongsToMany
     */
    public function quizAnswers() : BelongsToMany
    {
        return $this->belongsToMany(QuizAnswer::class, 'quiz_answer_stars', 'quiz_answer_id', 'star_id');
    }

}
