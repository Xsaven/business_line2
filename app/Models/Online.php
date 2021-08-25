<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Online.
 *
 * @property int $peck
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Online newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Online newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Online query()
 * @method static \Illuminate\Database\Eloquent\Builder|Online whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Online wherePeck($value)
 * @mixin \Eloquent
 */
class Online extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    /**
     * @var null
     */
    protected $primaryKey = null;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'peck',
    ];
}
