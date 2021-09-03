<?php

namespace App\Models;

use App\Models\Traits\Order\OrderHasLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Order Class.
 *
 * @package App\Models
 * @property int $id
 * @property string|null $phone
 * @property string|null $email
<<<<<<< HEAD
=======
 * @property string $address
>>>>>>> 0c222ff0c3507c824b62a222783b59d467a9ac96
 * @property string $status
 * @property int $user_id
 * @property int $delivery_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Delivery|null $delivery
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
<<<<<<< HEAD
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryId($value)
=======
>>>>>>> 0c222ff0c3507c824b62a222783b59d467a9ac96
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
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
