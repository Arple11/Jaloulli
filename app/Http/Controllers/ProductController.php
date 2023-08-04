<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $imageUrls = [];
        if ($images = $request->file('productImages')) {
            foreach ($images as $image) {
                Storage::disk('local')->put("productImages/{$request->post('productName')}/", $image);
                $name = $image->getClientOriginalName();
//                $image->move("productImages/{$request->post('productName')}", $name);
                $imageUrls[] = "productImages/{$request->post('productName')}" . "$name";
            }
        }

        DB::table('products')->insert([
            'product_name' => $request->post('productName'),
            'explanation' => $request->post('explanation'),
            'price' => $request->post('price'),
            'amount_available' => $request->post('amount_available'),
            'amount_sold' => $request->post('amount_sold'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $product = DB::table('products')
            ->where(['product_name' => $request->post('productName')])
            ->select(['id'])
            ->first();

        foreach ($imageUrls as $imageUrl) {
            DB::table('product_images')
                ->insert([
                    'product_id' => $product->id,
                    'image_url' => $imageUrl,
                ]);

        }
        return redirect()->route('Products_data');
    }
}
