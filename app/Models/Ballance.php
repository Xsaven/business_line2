<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ballance.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $user_id
 * @property int|null $task_id
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task|null $task
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereUserId($value)
 * @property int $cost
 * @method static \Illuminate\Database\Eloquent\Builder|Ballance whereCost($value)
 */
class Ballance extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'ballances';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'task_id',
        'message',
        'cost',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'int',
        'task_id' => 'int',
        'message' => 'string',
        'cost' => 'int',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function task(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }
}
