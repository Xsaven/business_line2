<?php

namespace App\Models;

use App\Models\Traits\Log\LogHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Log Class.
 *
 * @package App\Models
 * @property int $id
 * @property string|null $field
 * @property string $type
 * @property string $message
 * @property string $logable_type
 * @property int $logable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $order
 * @property-read Model|\Eloquent $product
 * @property-read Model|\Eloquent $task
 * @property-read Model|\Eloquent $taskReport
 * @property-read Model|\Eloquent $track
 * @property-read Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLogableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLogableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    use LogHelpers;

    const TITLE = 'Логи пользователей';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'logs';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'field',
        'type',
        'message',
        'logable_type',
        'logable_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'field' => 'string',
        'type' => 'string',
        'message' => 'string',
        'logable_type' => 'string',
        'logable_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'type' => 'system',
    ];

    /**
     * The "morphTo" relation for "Zakazy'".
     * @return MorphTo
     */
    public function order() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Produkty'".
     * @return MorphTo
     */
    public function product() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Otcyoty' zadanii".
     * @return MorphTo
     */
    public function taskReport() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Zadaniya".
     * @return MorphTo
     */
    public function task() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Treki".
     * @return MorphTo
     */
    public function track() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Polzovateli".
     * @return MorphTo
     */
    public function user() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }
}
