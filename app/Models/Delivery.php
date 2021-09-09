<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Delivery Class
 * @package App\Models
 */
class Delivery extends Model
{
    const TITLE = 'Пункты доставки';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'deliveries';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'address',
        'osp',
        'city'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "address" => 'string',
        "osp" => 'string',
        "city" => 'string'
    ];

    /**
     * The "hasMany" relation for "Zakazy'"
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class, 'delivery_id', 'id');
    }

}
