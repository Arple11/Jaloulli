<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add_order(Request $request)
    {
        $order = Order::create($request->all());
        $order->balance = -1 * $order->order_total_price;
        $order->save();
        return redirect()->route('Orders_data');
    }

    public function get_all_orders()
    {
        return view('orders.ordersData')->with(['orders' => Order::all()]);
    }

    public function delete_order($id)
    {
        Order::destroy($id);
        return redirect()->route('Orders_data');
    }

    public function edite_order($id)
    {
        return view('orders.editOrderMenue', ['order' => Order::find($id)]);
    }

    public function save_edited_order(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        $order->balance = -1 * $request->order_total_price;
        $order->save();
        return redirect()->route('Orders_data');
    }
}
