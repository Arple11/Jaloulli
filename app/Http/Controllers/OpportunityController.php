<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OpportunityController extends Controller
{
    public function store(Request $request)
    {
        Opportunity::create($request->all());
        return redirect()->route('opportunities_data');
    }
    public function get_all_opportunities()
    {
        return view('opportunitys.opportunitysData',['opportunities'=>Opportunity::GetAllOpportunities()]);
    }
    public function edit_opportunities($id)
    {
        return view('opportunitys.EditOpportunity',['opportunity'=>Opportunity::find($id)]);
    }
    public function store_edit_opportunities(Request $request , $id)
    {
        Opportunity::storeEditedOpportunities($request , $id);
        return redirect()->route('opportunities_data');
    }
    public function delete_opportunities($id)
    {
        Opportunity::destroy($id);
        return redirect()->route('opportunities_data');
    }
}