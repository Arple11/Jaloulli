<?php

namespace App\Models;

use Illuminate\Http\Request ;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product_image;
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $product_name
 * @property string $explanation
 * @property int $price
 * @property int $amount_available
 * @property int $amount_sold
 * @property string|null $tags
 * @property int $enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereAmountAvailable($value)
 * @method static Builder|Product whereAmountSold($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereEnable($value)
 * @method static Builder|Product whereExplanation($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereProductName($value)
 * @method static Builder|Product whereTags($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'explanation',
        'price',
        'amount_available',
        'amount_sold',
        'tags',
        'enable',
    ];

/*    public static function create(): Builder|Product
    {
        $request = request();
        $imageUrls = [];// an array of images urls so that we can store it as we want
        if ($images = $request->file('productImages')) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move("productImages/{$request->product_name}", $name);
                $imageUrls[] = "productImages/{$request->product_name}/" . "$name";
            }
        }
        $product = parent::create($request->all());

        #inserting [ product id, image url ] to product_images table
        foreach ($imageUrls as $imageUrl) {
            product_image::create([
                'product_id' => $product->id,
                'image_url' => $imageUrl,
            ]);
        }
        return Product::whereId($product->id);
    }*/
}
