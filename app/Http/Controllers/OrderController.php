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
    public function addOrder(Request $request): RedirectResponse
    {
        $req = (object)array_slice($request->all(), 1); //removing token
        $products = array_slice($request->all(), 4);
        array_pop($products);
        $order = Order::create([
            'order_name' => $req->order_name,
            'customer_id' => $req->customer_id,
            'seller_id' => $req->seller_id,
            'explanations' => $req->explanations,
        ]);
        $total = 0;
        foreach ($products as $product_id => $count) {
            if ($count > 0) {
                $id = (int)substr($product_id, 8);
                $product = Product::find($id);
                $total += ($product->price * $count);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'count' => $count,
                ]);
                $product->amount_available -= $count;
                $product->amount_sold += $count;
                $product->save();
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
            'order' => Order::with('seller:id', 'customer:id', 'products:id')->find($id),
        ];
//        $tmp = $data['order'];
//        dd(json_encode($tmp));
        return view('orders.editOrderMenue', $data);
    }

    public function saveEditedOrder(Request $request, $id): RedirectResponse
    {
        $req = (object)array_slice($request->all(), 1); //removing token
        $products = array_slice($request->all(), 3);
        $products = Arr::except($products, ['explanations', 'balance', 'order_total_price']);
        $order = Order::find($id);
        $order->customer_id = $req->customer_id;
        $order->seller_id = $req->seller_id;
        $order->explanations = $req->explanations;
        $total = 0;
        foreach ($products as $product_id => $count) {
            if (is_null($count)) {
                $count = 0;
            }
            $pid = (int)substr($product_id, 8);
            $productCont = OrderProduct::whereProductId($pid)
                ->whereOrderId($id)->select(['count', 'id'])
                ->first();
            $product = Product::with(['orders'])->find($pid);
            if (!is_null($productCont)) {
                $product->amount_available += $productCont->count;
                $product->amount_sold -= $productCont->count;
                $productCont->delete();
            }
            if ($count > 0) {
                $total += ($product->price * $count);
                OrderProduct::create([
                    'order_id' => $id,
                    'product_id' => $pid,
                    'count' => $count,
                ]);
                $product->amount_available -= $count;
                $product->amount_sold += $count;
                $product->save();
            }
        }
        $order->order_total_price = $total;
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
