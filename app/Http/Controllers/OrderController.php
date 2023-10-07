<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
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
    public function store(Request $request){
        $request->validate([
            "user_id" => 'required|string|max:255',
            "product_id" => 'required|string|max:255',
        ]);
        $order= Order::create($request->all());
        $order->products()->attach($request->product_id);
        return response()->json("success.");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}