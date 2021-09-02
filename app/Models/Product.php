<?php

namespace App\Models;

use App\Models\Traits\Product\ProductHasLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Product Class.
 * @package App\Models
 */
class Product extends Model
{
    use ProductHasLogs;

    const TITLE = 'Продукты';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'src',
        'cost',
        'settings',
        'setting_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'src' => 'string',
        'cost' => 'integer',
        'settings' => 'json',
        'setting_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'cost' => 1,
    ];

    /**
     * The "belongsToMany" relation for "Zakazy'".
     * @return BelongsToMany
     */
    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products', 'order_id', 'product_id');
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
     * The "hasOne" relation for "Nastroiki produktov".
     * @return HasOne
     */
    public function setting() : HasOne
    {
        return $this->hasOne(ProductSetting::class, 'id', 'setting_id');
    }
}
