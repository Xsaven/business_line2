<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ProductSetting Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductSetting extends Model
{
    const TITLE = 'Настройки продуктов';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'product_settings';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'name',
        'slug',
        'data',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'data' => 'json',
    ];

    /**
     * The "hasMany" relation for "Produkty'".
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class, 'setting_id', 'id');
    }
}
