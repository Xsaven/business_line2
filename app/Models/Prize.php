<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Prize Class
 * @package App\Models
 */
class Prize extends Model
{
    const TITLE = 'Призы';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'prizes';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'src'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "src" => 'string'
    ];

    /**
     * The "belongsToMany" relation for "Napravleniya"
     * @return BelongsToMany
     */
    public function directions() : BelongsToMany
    {
        return $this->belongsToMany(Direction::class, 'direction_prizes', 'direction_id', 'prize_id');
    }

}
