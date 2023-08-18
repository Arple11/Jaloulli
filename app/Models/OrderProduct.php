<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderProduct
 *
 * @property int                             $id
 * @property int                             $order_id
 * @property int                             $product_id
 * @property int                             $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderProduct extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'count',
        'product_id',
    ];
}
