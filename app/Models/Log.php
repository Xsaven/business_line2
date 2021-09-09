<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Log\LogHelpers;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Log Class
 * @package App\Models
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
        'logable_id'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "field" => 'string',
        "type" => 'string',
        "message" => 'string',
        "logable_type" => 'string',
        "logable_id" => 'integer'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "type" => 'system'
    ];

    /**
     * The "morphTo" relation for "Zakazy'"
     * @return MorphTo
     */
    public function order() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Produkty'"
     * @return MorphTo
     */
    public function product() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Otcyoty' zadanii"
     * @return MorphTo
     */
    public function taskReport() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Zadaniya"
     * @return MorphTo
     */
    public function task() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Polzovateli"
     * @return MorphTo
     */
    public function user() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

    /**
     * The "morphTo" relation for "Napravleniya"
     * @return MorphTo
     */
    public function direction() : MorphTo
    {
        return $this->morphTo('logable', 'logable_type', 'logable_id');
    }

}
