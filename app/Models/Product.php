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
 * @package App\Models
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
 * @property int $buy
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBuy($value)
 * @property array $scrap
 * @property-read float|int $total_scrap
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereScrap($value)
 * @property int $daily_limit
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDailyLimit($value)
 * @property int $daily_limit_by
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDailyLimitBy($value)
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
        'scrap',
        'daily_limit',
        'daily_limit_by',
        'settings',
        'setting_id',
        'buy',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'src' => 'string',
        'cost' => 'integer',
        'scrap' => 'array',
        'daily_limit' => 'integer',
        'daily_limit_by' => 'integer',
        'settings' => 'json',
        'setting_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'cost' => 1,
        'daily_limit' => 0,
        'daily_limit_by' => 0,
    ];

    /**
     * @param $value
     * @return array
     */
    public function getScrapAttribute($value): array
    {
        return $value ? json_decode($value, 1) : [];
    }

    /**
     * @return float|int
     */
    public function getTotalScrapAttribute(): float|int
    {
        return array_sum($this->scrap);
    }

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
