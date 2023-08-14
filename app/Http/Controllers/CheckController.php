<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
//        DB::table('checks')->where('id', $id)->delete();
//
//        return redirect()->route('Checks_data');
    }

    public function editCheck($id)
    {
        return view('checks.editCheckMenue', ['check' => Check::find($id)]);

//        $check = DB::table('checks')->where('id', $id)
//            ->select('order_id', 'seller_id', 'customer_id', 'total_pay', 'id as checkid')
//            ->first();

//       dd($check);
//        return view('checks.editCheckMenue', ['check' => $check]);
    }

    public function store_edited_check(Request $request, $id)
    {
        Check::Controllers($request,$id);

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


}






//asliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasli