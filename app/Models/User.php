<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Database\Factories\UserFactory;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\DatabaseNotificationCollection;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'middle_name',
        'email',
        'phone_number',
        'national_id',
        'age',
        'gender',
        'marital_state',
        'education',
        'job',
        'country',
        'state',
        'city',
        'address',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
