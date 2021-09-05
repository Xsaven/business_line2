<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * CommentaryRoom Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $state
 * @property string|null $video_title
 * @property string|null $video_info
 * @property string|null $video_data
 * @property string|null $translation_data
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentary[] $commentaries
 * @property-read int|null $commentaries_count
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereTranslationData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereVideoData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereVideoInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentaryRoom whereVideoTitle($value)
 * @mixin \Eloquent
 */
class CommentaryRoom extends Model
{
    const TITLE = 'Комнаты комментариев';

    const STATE_TRANSLATION = 'translation';

    const STATE_VIDEO = 'video';

    const STATES = [
        'translation' => 'Трансляция',
        'video' => 'Видео',
    ];

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'commentary_rooms';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'title',
        'state',
        'video_title',
        'video_info',
        'video_data',
        'translation_data',
        'description',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'title' => 'string',
        'state' => 'string',
        'video_title' => 'string',
        'video_info' => 'string',
        'video_data' => 'string',
        'translation_data' => 'string',
        'description' => 'string',
    ];

    /**
     * The "morphMany" relation for "Kommentarii".
     * @return MorphMany
     */
    public function commentaries() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }
}
