<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request){
        $request->validate([
            "user_id" => 'required|exists:users,id',
            "product_id" => 'required|exists:products,id',
        ]);
        $order= Order::create($request->all());
        $order->products()->attach($request->product_id);
        return response()->json("success.");
    }

    public function show($id){
        $order = Order::find($id);
        return response()->json($order);
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        $order -> update($request->all());
        $order -> save();
        return response()->json($order);
    }

    public function destroy($id){
        $order = Order::find($id);
        $order ->delete();
        return response()->json('Deleted.');
    }
}