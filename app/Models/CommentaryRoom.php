<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * CommentaryRoom Class
 * @package App\Models
 */
class CommentaryRoom extends Model
{
    const TITLE = 'Комнаты комментариев';

    const STATE_TRANSLATION = 'translation';

    const STATE_VIDEO = 'video';

    const STATES = [
        "translation" => 'Трансляция',
        "video" => 'Видео'
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
        'description'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "title" => 'string',
        "state" => 'string',
        "video_title" => 'string',
        "video_info" => 'string',
        "video_data" => 'string',
        "translation_data" => 'string',
        "description" => 'string'
    ];

    /**
     * The "morphMany" relation for "Kommentarii"
     * @return MorphMany
     */
    public function commentaries() : MorphMany
    {
        return $this->morphMany(Commentary::class, 'commentaryable', 'commentaryable_type', 'commentaryable_id', 'id');
    }

}
