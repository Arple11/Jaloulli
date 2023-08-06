<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\product_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(Request $request): RedirectResponse
    {

        $imageUrls = [];// an array of images urls so that wi can store it as we want
        if ($images = $request->file('productImages')) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move("productImages/{$request->post('productName')}", $name);
                $imageUrls[] = "productImages/{$request->post('productName')}/" . "$name";
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
        return redirect()->route('Products_data');
    }

    public function all_products(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        #storing useful data in $datas (making sure the data is enable)
        $datas = (DB::table('products')
            ->where('enable', '=', 1)
            ->select([
                'id',
                'product_name',
                'explanation',
                'price',
                'amount_available',
            ])->get());
        #serching in product_images table for images related to each data set
        $imagesArr = [];
        foreach ($datas as $data) {
            $images = DB::table('product_images')
                ->where('product_id', '=', $data->id)
                ->select('image_url')
                ->get();
            $imagesArr["$data->id"] = $images;
        }
        #making an array for passing to view
        $allData = [
            'products' => $datas,
            'productsImages' => $imagesArr
        ];
        #opening productsData view with the passing data
        return view('products.productsData')->with(['allData' => $allData]);
    }

    public function delete_product($id): RedirectResponse
    {
        DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'enable' => 0,
                'updated_at' => now(),
            ]);
        return redirect()->route('Products_data');
    }

    public function edit_product_menu($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = DB::table('products')
            ->where('id', '=', $id)
            ->select([
                'id',
                'product_name',
                'explanation',
                'price',
                'amount_available',
                'amount_sold',
            ])->first();
        return view('products.editProductMenue', ['product' => $data]);
    }

    public function store_edited_product(Request $request, $id): RedirectResponse
    {
        DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'product_name' => $request->post('product_name'),
                'explanation' => $request->post('explanation'),
                'price' => $request->post('price'),
                'amount_available' => $request->post('amount_available'),
                'amount_sold' => $request->post('amount_sold'),
                'updated_at' => now(),
            ]);
        return redirect()->route('Products_data');
    }
}
