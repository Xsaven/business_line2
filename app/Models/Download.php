<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Download Class.
 * @package App\Models
 */
class Download extends Model
{
    const TITLE = 'Загрузки';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'downloads';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'task_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'task_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * The "hasOne" relation for "Zadaniya".
     * @return HasOne
     */
    public function task() : HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
