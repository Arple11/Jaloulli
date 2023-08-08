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
            'order_number' => $request->post('order_number'),
            'customer_id' => $request->post('customer_id'),
            'seller_id' => $request->post('seller_id'),
            'total_pay' => $request->post('total_pay'),
        ]);
        return redirect()->route('Checks_data');
    }

    public function get_all_checks()
    {
        $data = DB::table('checks')
            ->select('order_number', 'customer_id', 'seller_id', 'total_pay')
            ->get();
//        dd($data);
        return (view('checks.checksData')->with(['checks' => $data]));
    }}
