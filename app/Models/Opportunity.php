<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

/**
 * App\Models\Opportunity
 *
 * @property int                             $id
 * @property int                             $customer_id
 * @property int                             $product_id
 * @property int                             $price
 * @property int                             $quantity
 * @property string|null                     $opportunity_explanation
 * @property string                          $opportunity_status
 * @property string                          $is_urgent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereIsUrgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereOpportunityExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereOpportunityStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opportunity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description',
    ];
}