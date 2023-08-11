<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckController extends Controller
{
    public function create(Request $request)
    {
//dd($request);
        DB::table('checks')->insert([
            'order_id' => $request->post('order_number'),
            'customer_id' => $request->post('customer_id'),
            'seller_id' => $request->post('seller_id'),
            'total_pay' => $request->post('total_pay'),
        ]);
        return redirect()->route('Checks_data');
    }

    public function get_all_checks()
    {
        $data = DB::table('checks')
            ->select('order_id', 'customer_id', 'seller_id', 'total_pay', 'id')
            ->get();
//        dd($data);
        return (view('checks.checksData')->with(['checks' => $data]));
    }


    public function delete_check($id)
    {
        DB::table('checks')->where('id', $id)->delete();

        return redirect()->route('Checks_data');
    }
    public function editCheck($id)
    {
       $check=DB::table('checks')->where('id',$id)
           ->select('order_id','seller_id','customer_id','total_pay','id as checkid')
           ->first();

//       dd($check);
        return view('checks.editCheckMenue',['check'=>$check]);
    }
    public function store_edited_check(Request $request,$id){
//        dd($request);
        $check=DB::table('checks')->where('id',$id)
        ->update([
            'order_id' => $request->post('order_number'),
            'customer_id' => $request->post('customer_id'),
            'seller_id' => $request->post('seller_id'),
            'total_pay' => $request->post('total_pay'),
        ]);

        return view('checks.editCheckMenue',['check'=>$check]);
    }



}






//asliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasliasli