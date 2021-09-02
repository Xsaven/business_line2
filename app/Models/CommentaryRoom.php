<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * CommentaryRoom Class.
 * @package App\Models
 */
class CommentaryRoom extends Model
{
    const TITLE = 'Комнаты комментариев';

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
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
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
