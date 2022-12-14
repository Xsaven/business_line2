<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Direction Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string|null $video
 * @property string|null $banner
 * @property string|null $description
 * @property string|null $description_inside
 * @property string $terms_of_participation
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $end_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prize[] $prizes
 * @property-read int|null $prizes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereArbitratorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereArbitratorPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereArbitratorPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereDescriptionInside($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereTermsOfParticipation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereVideo($value)
 * @mixin \Eloquent
 * @property string|null $arbitrator_name
 * @property string|null $arbitrator_photo
 * @property string|null $arbitrator_position
 */
class Direction extends Model
{
    const TITLE = '??????????????????????';

    const TYPE_VIDEO = 'video';

    const TYPE_BANNER = 'banner';

    const TYPES = [
        'video' => '??????????',
        'banner' => '????????????',
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
        'description',
        'description_inside',
        'terms_of_participation',
        'start_at',
        'end_at',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'type' => 'string',
        'video' => 'string',
        'banner' => 'string',
        'description' => 'string',
        'description_inside' => 'string',
        'terms_of_participation' => 'string',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'type' => 'video',
    ];

    /**
     * The "hasMany" relation for "Zadaniya".
     * @return HasMany
     */
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class, 'direction_id', 'id');
    }

    /**
     * The "hasMany" relation for "Polzovateli".
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'direction_id', 'id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei".
     * @return MorphMany
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "belongsToMany" relation for "Prizy'".
     * @return BelongsToMany
     */
    public function prizes() : BelongsToMany
    {
        return $this->belongsToMany(Prize::class, 'direction_prizes', 'direction_id', 'prize_id');
    }
}
