<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ProductSetting Class
 * @package App\Models
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
        'data'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "name" => 'string',
        "slug" => 'string',
        "data" => 'json'
    ];

    /**
     * The "hasMany" relation for "Produkty'"
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class, 'setting_id', 'id');
    }

}
