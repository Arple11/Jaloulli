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
    public function index()
    {
        $users = Product::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ]);
        Product::create($request->all());
        return response()->json("success.");
    }

    public function destroy($id)
    {
        $user = Product::find($id);
        $user->delete();
        return response()->json("Deleted.");
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $user = Product::find($id);
        $user->update($request->all());
        $user->save();
        return response()->json("updated");
    }
}
