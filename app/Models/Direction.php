<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Direction Class
 * @package App\Models
 */
class Direction extends Model
{
    const TITLE = 'Направления';

    const TYPE_VIDEO = 'video';

    const TYPE_BANNER = 'banner';

    const TYPES = [
        "video" => 'Видео',
        "banner" => 'Баннер'
    ];

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'directions';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'video',
        'banner',
        'arbitrator_name',
        'arbitrator_photo',
        'arbitrator_position',
        'description',
        'description_inside',
        'terms_of_participation',
        'start_at',
        'end_at'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "slug" => 'string',
        "type" => 'string',
        "video" => 'string',
        "banner" => 'string',
        "arbitrator_name" => 'string',
        "arbitrator_photo" => 'string',
        "arbitrator_position" => 'string',
        "description" => 'string',
        "description_inside" => 'string',
        "terms_of_participation" => 'string',
        "start_at" => 'datetime',
        "end_at" => 'datetime'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "type" => 'video'
    ];

    /**
     * The "hasMany" relation for "Zadaniya"
     * @return HasMany
     */
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class, 'direction_id', 'id');
    }

    /**
     * The "hasMany" relation for "Polzovateli"
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'direction_id', 'id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei"
     * @return MorphMany
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "belongsToMany" relation for "Prizy'"
     * @return BelongsToMany
     */
    public function prizes() : BelongsToMany
    {
        return $this->belongsToMany(Prize::class, 'direction_prizes', 'direction_id', 'prize_id');
    }

}
