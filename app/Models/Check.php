<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Check
 *
 * @property int $id
 * @property int $order_id
 * @property int $customer_id
 * @property int $seller_id
 * @property int $total_pay
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Check newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Check newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Check query()
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereTotalPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Check whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'total_pay',

    ];
    protected function User(): HasMany
    {
        return $this->hasMany(User::class);
    }
}


