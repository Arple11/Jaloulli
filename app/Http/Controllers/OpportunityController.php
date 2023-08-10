<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class OpportunityController extends Controller
{
    public function store(Request $request): string
    {
        if (isset($request->is_urgent)) {
            $temp = $request->is_urgent;
        } else {
            $temp = 'off';
        }

        DB::table('opportunities')->insert([
            'customer_id' => $request->post('customer_id'),
            'product_id' => $request->post('product_id'),
            'price' => $request->post('price'),
            'quantity' => $request->post('quantity'),
            'opportunity_explanation' => $request->post('opportunity_explanation'),
            'opportunity_status' => $request->post('opportunity_status'),
            'is_urgent' => $temp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('opportunities_data');
    }
    public function get_all_opportunities()
    {
        $data = DB::table('opportunities')
            ->select('customer_id','price','opportunity_status','opportunity_explanation','is_urgent','product_id','id','quantity')
            ->get();
        return (view('opportunitys.opportunitysData')->with(['opportunities'=>$data]));
    }
    public function edit_opportunities($id)
    {
   $data = DB::table('opportunities')
        ->where('id',$id)
        ->first();
        return (view('opportunitys.EditOpportunity')->with(['opportunity'=>$data]));
    }
    public function store_edit_opportunities(Request $request ,$id)
    {
        DB::table('opportunities')
            ->where('id', $id)
            ->update([
                'quantity' => $request->post('quantity'),
                'price' => $request->post('price'),
                'opportunity_explanation' => $request->post('opportunity_explanation'),
                'opportunity_status' => $request->post('opportunity_status'),
                'updated_at' => now(),
                ]);
        return redirect()->route('opportunities_data');
    }
    public function delete_opportunities(Request $request , $id)
    {
        DB::table('opportunities')
            ->where('id', $id)
            ->delete();
        return redirect()->route('opportunities_data');
    }
}