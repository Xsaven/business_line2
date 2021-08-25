<?php

namespace App\Models;

use App\Models\Traits\Track\TrackHasLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Track Class.
 *
 * @property int $id
 * @property string $name
 * @property string|null $video
 * @property string $arbitrator_name
 * @property string $arbitrator_photo
 * @property string $arbitrator_position
 * @property string|null $short_description
 * @property string $terms_of_participation
 * @property int $direction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Direction|null $direction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prize[] $prizes
 * @property-read int|null $prizes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TrackFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Track newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track query()
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereArbitratorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereArbitratorPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereArbitratorPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereTermsOfParticipation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereVideo($value)
 * @mixin \Eloquent
 */
class Track extends Model
{
    use TrackHasLogs, HasFactory;

    const TITLE = 'Треки';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'tracks';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'video',
        'arbitrator_name',
        'arbitrator_photo',
        'arbitrator_position',
        'short_description',
        'terms_of_participation',
        'direction_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'video' => 'string',
        'arbitrator_name' => 'string',
        'arbitrator_photo' => 'string',
        'arbitrator_position' => 'string',
        'short_description' => 'string',
        'terms_of_participation' => 'string',
        'direction_id' => 'integer',
    ];

    /**
     * The "hasMany" relation for "Zadaniya".
     */
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class, 'track_id', 'id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei".
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "hasOne" relation for "Napravleniya".
     */
    public function direction() : HasOne
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    /**
     * The "belongsToMany" relation for "Prizy'".
     */
    public function prizes() : BelongsToMany
    {
        return $this->belongsToMany(Prize::class, 'track_prizes', 'track_id', 'prize_id');
    }

    /**
     * The "belongsToMany" relation for "Polzovateli".
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_tracks', 'user_id', 'track_id');
    }
}
