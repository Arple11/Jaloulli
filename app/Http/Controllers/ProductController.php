<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class ProductController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        Product::saveWithImage($request);
        return redirect()->route('Products_data');
    }

    public function all_products(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        #opening productsData view with the passing data
        return view('products.productsData')->with(Product::getAllProductsWithImage());
    }

    public function delete_product($id): RedirectResponse
    {
        Product::destroy($id);
        return redirect()->route('Products_data');
    }

    public function edit_product_menu($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.editProductMenue', ['product' => Product::editSelect($id)]);
    }

    public function store_edited_product(Request $request, $id): RedirectResponse
    {
        Product::saveEditedProduct($request,$id);
        return redirect()->route('Products_data');
    }


}
