<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OpportunityController extends Controller
{
    public function store(Request $request){
        $request ->validate([
            'product_id'=> 'required|',
            'description'=> 'string|max:255'
        ]);
        Opportunity::create($request->all());
        return response()->json('successs.');
    }

    public function index(){
        $opportunities = Opportunity::all();
        return response()->json($opportunities);
    }

    public function update(Request $request, $id){
        $opportunity = Opportunity::find($id);
        $opportunity -> update($request->all());
        $opportunity -> save();
        return response()->json($opportunity);
    }

    public function show($id){
        $opportunity =Opportunity::find($id);
        return response()->json($opportunity);
    }

    public function destroy($id){
        $opportunity = Opportunity::find($id);
        $opportunity -> delete();
        return response()->json('deleted.');
    }
}