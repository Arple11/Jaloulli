<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'price',
        'quantity',
        'opportunity_explanation',
        'opportunity_status',
        'is_urgent',
    ];
    protected $attributes = [
        'opportunity_explanation' => null,
    ];
    public static function GetAllOpportunities()
    {
        return Opportunity::select('customer_id','price','opportunity_status','opportunity_explanation','is_urgent','product_id','id','quantity')
        ->get();
    }
    public static function storeEditedOpportunities(Request $request,$id)
    {
        return Opportunity::find($id)->update($request->all());
    }
}