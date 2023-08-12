<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class OrderController extends Controller
{
    public function addOrder(Request $request): RedirectResponse
    {
        $req = (object)array_slice($request->all(), 1); //removing token
        $products = array_slice($request->all(), 3);
        array_pop($products);
        $order = Order::create([
            'customer_id' => $req->customer_id,
            'seller_id' => $req->seller_id,
            'explanations' => $req->explanations,
        ]);
        $total = 0;
        foreach ($products as $product_id => $count) {
            if ($count > 0) {
                $product = Product::find($product_id + 1);
                $total += ($product->price * $count);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id + 1,
                    'count' => $count,
                ]);
                $product->amount_available -= $count;
                $product->amount_sold += $count;
            }
        }
        $order->order_total_price = $total;
        $order->balance = -1 * $order->order_total_price;
        $order->save();
        return redirect()->route('Orders_data');
    }

    public function getAllOrders(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::with(['products' => function ($query) {
            $query->select('products.id', 'products.product_name', 'products.price');
            $query->withPivot('count');
        }])->get();
//        dd(($orders));
        $allData = [
            'orders' => $orders
        ];
        return view('orders.ordersData')->with($allData);
    }

    public function deleteOrder($id)
    {
        Order::destroy($id);
        return redirect()->route('Orders_data');
    }

    public function editOrder($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [
            'sellers' => $this->sellers(),
            'customers' => $this->customers(),
            'products' => Product::all(),
            'order' => Order::with('seller:id','customer:id','products:id')->find($id),
        ];
//        $tmp = $data['order'];
//        dd(json_encode($tmp));
        return view('orders.editOrderMenue', $data);
    }

    public function saveEditedOrder(Request $request, $id): RedirectResponse
    {
        $order = Order::find($id);
        $order->update($request->all());
        $order->balance = -1 * $request->order_total_price;
        $order->save();
        return redirect()->route('Orders_data');
    }

    protected function products_available(): Collection
    {
        return Product::select(['id', 'product_name', 'price', 'amount_available'])
            ->where('amount_available', '>', 0)
            ->get();
    }

    protected function customers(): Collection
    {
        return User::whereRoleId(1)
            ->select(['id', 'email', 'last_name'])
            ->get();
    }

    protected function sellers(): Collection
    {
        return User::whereRoleId(2)
            ->select(['id', 'email', 'last_name'])
            ->get();
    }

    public function addOrderPage(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [
            'sellers' => $this->sellers(),
            'customers' => $this->customers(),
            'products_available' => $this->products_available()
        ];
        return view('orders.addOrder', $data);
    }
}
