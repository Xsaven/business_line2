<?php

namespace App\Models;

use App\Models\Traits\Order\OrderHasLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Order Class.
 * @package App\Models
 */
class Order extends Model
{
    use OrderHasLogs;

    const TITLE = 'Заказы';

    const STATUS_CREATED = 'created';

    const STATUS_APPROVED = 'approved';

    const STATUS_TRANSIT = 'transit';

    const STATUS_SUCCESS = 'success';

    const STATUSES = [
        'created' => 'Создан',
        'approved' => 'Оформлен',
        'transit' => 'В пути',
        'success' => 'Доставлен',
    ];

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'phone',
        'email',
        'status',
        'user_id',
        'delivery_id',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'phone' => 'string',
        'email' => 'string',
        'status' => 'string',
        'user_id' => 'integer',
        'delivery_id' => 'integer',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'status' => 'created',
    ];

    /**
     * The "belongsToMany" relation for "Produkty'".
     * @return BelongsToMany
     */
    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }

    /**
     * The "hasOne" relation for "Polzovateli".
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
     * The "hasOne" relation for "Punkty' dostavki".
     * @return HasOne
     */
    public function delivery() : HasOne
    {
        return $this->hasOne(Delivery::class, 'id', 'delivery_id');
    }
}
