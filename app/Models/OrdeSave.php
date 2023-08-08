<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrdeSave
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdeSave whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrdeSave extends Model
{
    use HasFactory;
}
