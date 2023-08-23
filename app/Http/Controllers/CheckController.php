<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Check;

class CheckController extends Controller
{
    public function create(Request $request)
    {
//        $req = $request->all();
//        array_shift($req);

        Check::create($request->except('_token'));

        return redirect()->route('Checks_data');
////dd($request);
//        DB::table('checks')->insert([
//            'order_id' => $request->post('order_number'),
//            'customer_id' => $request->post('customer_id'),
//            'seller_id' => $request->post('seller_id'),
//            'total_pay' => $request->post('total_pay'),
//        ]);
//        return redirect()->route('Checks_data');
    }

    public function get_all_checks()
    {
        $checks = Check::all();
        return (view('checks.checksData')->with(['checks' => $checks]));
//        $data = DB::table('checks')
//            ->select('order_id', 'customer_id', 'seller_id', 'total_pay', 'id')
//            ->get();
////        dd($data);
//        return (view('checks.checksData')->with(['checks' => $data]));
    }


    public function delete_check($id)
    {
        Check::destroy($id);
        return redirect()->route('Checks_data');

    }

    public function editCheck($id)
    {
        return view('checks.editCheckMenue', ['check' => Check::find($id)]);

    }

    public function store_edited_check(Request $request, $id)
    {

        Check::find($id)
            ->update($request->toArray());

//        dd($request);
//        $check = DB::table('checks')->where('id', $id)
//            ->update([
//                'order_id' => $request->post('order_number'),
//                'customer_id' => $request->post('customer_id'),
//                'seller_id' => $request->post('seller_id'),
//                'total_pay' => $request->post('total_pay'),
//            ]);

        return redirect()->route('Checks_data');
//        return view('checks.editCheckMenue', ['check' => $check]);
    }

    public function addCheck()
    {
        return view('checks.addCheck', ['orders' => Order::all()]);
    }


    public function filterCheck(Request $request)
    {
        $check = new Check();
        if (!is_null($request->filterOrderId)) {
            $check = $check->where('name', 'like', '%' . $request->filterOrderId . '%');
        }
        if (!is_null($request->filterFirstName)) {
            $check = $check->where('name', 'like', '%' . $request->filterFirstName . '%');
        }
        if (!is_null($request->filterFirstName)) {
            $check = $check->where('name', 'like', '%' . $request->filterFirstName . '%');
        }
        if (!is_null($request->filterFirstName)) {
            $check = $check->where('name', 'like', '%' . $request->filterFirstName . '%');
        }
        if (!is_null($request->filterFirstName)) {

        }

    }
}
