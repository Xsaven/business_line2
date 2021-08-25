<?php

namespace App\Models;

use App\Models\Traits\Product\ProductHasLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Product Class.
 *
 * @property int $id
 * @property string $name
 * @property string $src
 * @property int $cost
 * @property array $settings
 * @property int $setting_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\ProductSetting|null $setting
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
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
     */
    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products', 'order_id', 'product_id');
    }

    /**
     * The "morphMany" relation for "Logi polzovatelei".
     */
    public function logs() : MorphMany
    {
        return $this->morphMany(Log::class, 'logable', 'logable_type', 'logable_id', 'id');
    }

    /**
     * The "hasOne" relation for "Nastroiki produktov".
     */
    public function setting() : HasOne
    {
        return $this->hasOne(ProductSetting::class, 'id', 'setting_id');
    }
}
