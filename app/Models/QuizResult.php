<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * QuizResult Class
 * @package App\Models
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
        'task_id'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "is_success" => 'boolean',
        "time" => 'string',
        "user_id" => 'integer',
        "task_id" => 'integer'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "is_success" => 1,
        "time" => '00:00'
    ];

    /**
     * The "hasOne" relation for "Polzovateli"
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * The "hasOne" relation for "Zadaniya"
     * @return HasOne
     */
    public function task() : HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

}
