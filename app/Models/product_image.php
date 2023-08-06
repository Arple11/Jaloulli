<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\product_image
 *
 * @property int $id
 * @property int $product_id
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|product_image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product_image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product_image query()
 * @method static \Illuminate\Database\Eloquent\Builder|product_image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_image whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_image whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class product_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_url',
    ];
}
