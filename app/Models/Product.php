<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product_image;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Product
 *
 * @property int                             $id
 * @property string                          $product_name
 * @property string                          $explanation
 * @property int                             $price
 * @property int                             $amount_available
 * @property int                             $amount_sold
 * @property string|null                     $tags
 * @property int                             $enable
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
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_name',
        'explanation',
        'price',
        'amount_available',
        'amount_sold',
        'tags',
        'enable',
    ];

    public static function saveWithImage(Request $request): Builder|Product
    {
        $imageUrls = [];// an array of images urls so that we can store it as we want
        if ($images = $request->file('productImages')) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move("productImages/{$request->product_name}", $name);
                $imageUrls[] = "productImages/{$request->product_name}/" . "$name";
            }
        }
        $product = Product::create($request->all());
        #inserting [ product id, image url ] to product_images table
        foreach ($imageUrls as $imageUrl) {
            product_image::create([
                'product_id' => $product->id,
                'image_url' => $imageUrl,
            ]);
        }
        return Product::whereId($product->id);
    }

    public static function getAllProductsWithImage()
    {
        $oldTrashs = Product::onlyTrashed()
            ->where('deleted_at', '<=', Carbon::now()->subDays(90))
            ->get();
        foreach ($oldTrashs as $oldTrash)
            $oldTrash->forceDelete();
        #storing useful data in $datas (making sure the data is enable)
        $datas = Product::select([
            'id',
            'product_name',
            'explanation',
            'price',
            'amount_available',
        ])->get();
        #serching in product_images table for images related to each data set
        $imagesArr = [];
        foreach ($datas as $data) {
            $images = product_image::whereProductId($data->id)
                ->select('image_url')
                ->get();
            $imagesArr["$data->id"] = $images;
        }
        #making an array for passing to view
        $allData = [
            'products' => $datas,
            'productsImages' => $imagesArr
        ];
        return $allData;
    }

    public static function editSelect(int $id)
    {
        return Product::find($id)
            ->select([
                'id',
                'product_name',
                'explanation',
                'price',
                'amount_available',
                'amount_sold',
            ]);
    }

    public static function saveEditedProduct(Request $request, int $id)
    {
        $product = Product::find($id);
        $product->fill([
            'product_name' => $request->product_name,
            'explanation' => $request->explanation,
            'price' => $request->price,
            'amount_available' => $request->amount_available,
            'amount_sold' => $request->amount_sold,
        ]);
        $product->save();
        return $product;
    }
}

