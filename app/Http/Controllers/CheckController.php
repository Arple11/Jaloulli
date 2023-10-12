<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Check;

class CheckController extends Controller
{
    public function store(Request $request){
        $request -> validate([
            "order_id"=>'required',
            "user_id"=>'required',
            "total_price"=>'required'
        ]);
        Check::create($request->all());
        return response()->json('success.');
    }
    public function show($id){
        $opportunity=Check::find($id);
        return response()->json($opportunity);
    }
    public function index(){
        $opportunities=Check::all();
        return response()->json($opportunities);
    }
    public function update(Request $request, $id){
        $opportunity=Check::find($id);
        $opportunity->update($request->all());
        $opportunity->save();
        return response()->json($opportunity);
    }
    public function destroy($id){
        $opportunity=Check::find($id);
        $opportunity->delete();
        return response()->json('deleted.');
    }
}